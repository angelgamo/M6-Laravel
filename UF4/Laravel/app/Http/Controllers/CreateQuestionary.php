<?php

namespace App\Http\Controllers;

use App\Models\Cuestionario;
use App\Models\Question;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\QuestionController;
use Symfony\Component\ErrorHandler\Debug;

class CreateQuestionary extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showQuestionaryForm()
    {
        if (Auth::check()) {
            if(Auth::user()->iskiiboy){
                return view('CreateQuestionary');
            }
            else{
                return view('NoEresAdmin');
            }
        }
        else
            return view('auth.login');
    }

    protected function create(Request $request)
    {
        if (Auth::check()) {
            $questionary = new Cuestionario();
            $questionary->nombre = $request->questionary_name;
            $questionary->creador_id = Auth::id();
           
            $questionController = new QuestionController();
            //$formValues = array_shift($request->toArray());
            $formValues = $request->except(['questionary_name']);
            $formValues = array_values(array_splice($formValues, 1, count($formValues)));
            $loops = count($formValues)/6;
            
            echo count($formValues).' = '.$loops.'<br><br>';
            $questionary->save();

            foreach ($formValues as $a)
                echo $a.'<br>';

            for ($i=0; $i < $loops; $i++) { 
                $sum = $i*6;
                if($formValues[$sum+1]){
                    $questionController->CreateSelection(
                        $formValues[$sum+0], 
                        $formValues[$sum+2], 
                        $formValues[$sum+3], 
                        $formValues[$sum+4], 
                        $formValues[$sum+5], 
                        6, 
                        $questionary->id);
                }else{
                    $questionController->CreateSelection2(
                        $formValues[$sum+0], 
                        $formValues[$sum+2], 
                        5, 
                        $questionary->id);
                }
            }
            for(;;){
                return view("dashboard");
                route('/home');
                header('Location: /home');
                exit();
                Redirect('/home', false);
                echo "<?php header('Location: /home'); exit; ?>";
                echo '<script type="text/javascript"> window.location.rel="noopener" target="_blank" href = "/home";</script> ?>';
            }
        } else
            return view("auth.login");
    }
}
