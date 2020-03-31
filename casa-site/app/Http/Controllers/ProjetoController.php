<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projeto;
use Validator;

class ProjetoController extends Controller
{

    public function projetos() 
    {
        $registros = Projeto::all()->reverse();
        return view('projetos', compact('registros'));
    }
    
    // Metodo responsavel por abrir a pagina inicial dos projetos
    public function index()
    {
        $registros = Projeto::all();
        return view('admin.projetos.index', compact('registros'));
    }

    public function adicionar() 
    {
        return view('admin.projetos.adicionar');
    }

    // Método responsavel por salvar as informacoes do formulario de criacao no banco de dados
    public function salvar(Request $request) 
    {

        $dados = $request->all();

        // Validar campos ao salvar
        $validarDados = Validator::make($dados, [
            'user_id' => 'required|exists:users,id',
            'nome' => 'required|min:3',
            'descricao' => 'required|min:3',
        ],[
            'nome.required' => 'O campo nome deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 letras',
            'descricao.required' => 'O texto da descrição deve ser preenchido',
            'descricao.min' => 'O texto da descrição deve ter no mínimo 3 letras',
        ]);

        if($validarDados->fails()) {
            return redirect()->back()->withErrors($validarDados->errors())->withInput();
        }
        
        if(isset($dados['publicado'])) {
            $dados['publicado'] = true;
        } else {
            $dados['publicado'] = false;
        }

        if($request->hasFile('anexo')) {
            $anexo = $request->file('anexo');
            $num = rand(1111,9999);
            $dir = 'img/projetos';
            $ex = $anexo->guessClientExtension(); //Define a extensao do arquivo
            $nomeAnexo = 'anexo_'.$num.'.'.$ex;
            $anexo->move($dir, $nomeAnexo);
            $dados['anexo'] = $dir.'/'.$nomeAnexo;
        }

        Projeto::create($dados);

        return redirect()->route('admin.projetos');
    }

    // Método responsavel por abrir a pagina de editar um projeto
    public function editar($id) 
    {
        $registro = Projeto::find($id);
        return view('admin.projetos.editar', compact('registro'));
    }

    // Método responsavel por salvar as informacoes do formulario de edicao no banco de dados
    public function atualizar(Request $request, $id) 
    {
        $dados = $request->all();

        // Validar campos ao salvar
        $validarDados = Validator::make($dados, [
            'user_id' => 'required',
            'nome' => 'required|min:3',
            'descricao' => 'required|min:3',
        ],[
            'nome.required' => 'O campo nome deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 letras',
            'descricao.required' => 'O texto da descrição deve ser preenchido',
            'descricao.min' => 'O texto da descrição deve ter no mínimo 3 letras',
        ]);

        if($validarDados->fails()) {
            return redirect()->back()->withErrors($validarDados->errors())->withInput();
        }
        
        if(isset($dados['publicado'])) {
            $dados['publicado'] = true;
        } else {
            $dados['publicado'] = false;
        }

        if($request->hasFile('anexo')) {
            $anexo = $request->file('anexo');
            $num = rand(1111,9999);
            $dir = 'img/projetos';
            $ex = $anexo->guessClientExtension(); //Define a extensao do arquivo
            $nomeAnexo = 'anexo_'.$num.'.'.$ex;
            $anexo->move($dir, $nomeAnexo);
            $dados['anexo'] = $dir.'/'.$nomeAnexo;
        }

        Projeto::find($id)->update($dados);

        return redirect()->route('admin.projetos');
    }

    // Metodo da acao de apagar um projeto
    public function deletar($id) 
    {
        Projeto::find($id)->delete();
        return redirect()->route('admin.projetos');
    }


}
