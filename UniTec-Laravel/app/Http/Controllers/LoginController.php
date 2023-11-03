<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function login(Request $request){

        $erro = '' ;
        if($request->get('erro') == 1){
            $erro = "Usuário ou senha inválido !";
        }else if($request->get('erro') == 2){
            $erro = "Necessário realizar login para ter acesso a página";
        };

        return view('app.login.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    
    public function autenticar(Request $request){
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        $login = $request->get('usuario');
        $password = $request->get('senha');
        $usuario = new Usuario();

        $usuario_login = $usuario->where('email', $login)
                        ->where('senha', $password)
                        ->get()
                        ->first();


        if(isset($usuario_login->id_usuario)){
            session_start();
            $_SESSION['id'] = $usuario_login->id_usuario;
            $_SESSION['pessoa'] = $usuario_login->id_pessoa;
            $_SESSION['email'] = $usuario_login->email;
            $_SESSION['professor'] = $usuario_login->id_professor;
            $_SESSION['aluno'] = $usuario_login->id_aluno;
            $_SESSION['curso'] = $usuario_login->id_curso;
            $_SESSION['loja'] = $usuario_login->id_loja;

            return redirect()->route('app.index');
        }else{
            return redirect()->route('site.login', ['erro' => 1]);
        }

    }

    
    public function logout(Request $request){
        session_start();
        session_destroy();
        return redirect()->route('site.index');
    }
}
