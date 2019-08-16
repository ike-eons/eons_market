<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\FlashMessages;


class BaseController extends Controller
{
    use FlashMessages;

    protected $data = null;

    protected function setPageTitle($title,$subTitle)
    {
        view()->share(['pageTitle'=>$title, 'subTitle'=>$subTitle]);
    }

    //dispay error type
    protected function showErrorPage($errorCode = 404, $message = null)
    {
        $data['message'] = $message;

        return response()->view('error.'.$errorCode, $data, $errorCode);
    }
    
    //show type of error in vue or ajax
    protected function responseJson($error = true, $responseCode = 200, $message = [], $data = [])
    {
        return response()->json([
            'error'         => $error,
            'response_code' => $responseCode,
            'message'       => $message,
            'data'          => $data
        ]);
    }

    /*
        Redirect page if the request is http
    */
    protected function responseRedirect($route, $message, $type = 'info',$error = false, $withOldInputWhenError = false)
    {
        $this->setFlashMessage($message, $type);
        $this->showFlashMessages();

        if($error && $withOldInputWhenError)
        {
            return redirect()->back()->withInput();
        }

        return redirect()->route($route);
    }

    protected function responseRedirectBack($message, $type = 'info', $error = false, $withOldInputWhenError = false)
    {
        $this->setFlashMessage($message,$type);
        $this->showFlashMessages();

        return redirect()->back();
    }
}
