<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminTriagens25Controller extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "pacientes_id,asc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "triagens";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Data","name"=>"dataAtual"];
			$this->col[] = ["label"=>"Nome do paciente","name"=>"pacientes_id","join"=>"pacientes,nome"];
			$this->col[] = ["label"=>"Idade","name"=>"pacientes_id","join"=>"pacientes,idadeAtual"];
			$this->col[] = ["label"=>"CPF","name"=>"pacientes_id","join"=>"pacientes,cpf"];
			$this->col[] = ["label"=>"RG","name"=>"pacientes_id","join"=>"pacientes,rg"];
			$this->col[] = ["label"=>"Orgão emissor","name"=>"pacientes_id","join"=>"pacientes,orgaoEmissor"];
			$this->col[] = ["label"=>"Encaminhamento","name"=>"tipoEncaminhamento"];
			$this->col[] = ["label"=>"Motivo do Encaminhamento","name"=>"motivoEncaminhamento"];
			$this->col[] = ["label"=>"Queixa principal contextualizada","name"=>"queixa"];
			$this->col[] = ["label"=>"O(a) paciente já fez tratamento psicoterápico?","name"=>"realizaTratamentoPsico"];
			$this->col[] = ["label"=>"Se sim, por quanto tempo?","name"=>"tempoTratamentoPsico"];
			$this->col[] = ["label"=>"Há outros membros da família sob tratamento psicoterápico e /ou psiquiátrico?","name"=>"familiaRealizaTratPsico"];
			$this->col[] = ["label"=>"Se sim, especificar nomes dos familiares (Atentar para familiares em gerações anteriores)","name"=>"nomesFamiliares"];
			$this->col[] = ["label"=>"O(A) paciente tem hábito de se auto-medicar?","name"=>"habitoAutoMedicar"];
			$this->col[] = ["label"=>"Se sim, por quanto tempo?","name"=>"tempoAutoMedicacao"];
			$this->col[] = ["label"=>"Em que circunstâncias e qual tipo de medicamento utilizado?","name"=>"medicamentoUtilizado"];
			$this->col[] = ["label"=>"O paciente faz uso de medicação psiquiátrica?","name"=>"medicacaoPsiquiatrica"];
			$this->col[] = ["label"=>"Se sim, qual(is)?","name"=>"medicamentoPsiquiatrico"];
			$this->col[] = ["label"=>"Há quanto tempo?","name"=>"tempoMedicamentoPsiquiatrico"];
			$this->col[] = ["label"=>"Identificar o último Médico Psiquiatra","name"=>"ultimoMedicoPsiquiatra"];
			$this->col[] = ["label"=>"Há histórico de internação psiquiátrica?","name"=>"historicoInternacao"];
			$this->col[] = ["label"=>"Se sim, quando?","name"=>"quandoHistoricoInternacao"];
			$this->col[] = ["label"=>"O tratamento psiquiátrico foi concluído?","name"=>"tratamentoConcluido"];
			$this->col[] = ["label"=>"Qual o nome da Instituição de internação?","name"=>"nomeInstituicaoInternacao"];
			$this->col[] = ["label"=>"O(a) paciente faz uso abusivo de drogas?","name"=>"usoAbusivoDrogas"];
			$this->col[] = ["label"=>"Se sim, Quais as substâncias psicoativas utilizadas?","name"=>"substanciaPsicoativa"];
			$this->col[] = ["label"=>"Atividade Profissional","name"=>"tipoAtividadeProfissional"];
			$this->col[] = ["label"=>"Há caso de crianças e adolescentes","name"=>"temCriancaAdolescente"];
			$this->col[] = ["label"=>"Período em que estuda","name"=>"periodoEstudo"];
			$this->col[] = ["label"=>"Nome da escola","name"=>"nomeEscola"];
			$this->col[] = ["label"=>"Horários disponíveis para a psicoterapia","name"=>"horarioDisponivel"];
			$this->col[] = ["label"=>"Síntese do Caso:","name"=>"sinteseCaso"];
			$this->col[] = ["label"=>"Encaminhamento sugerido pela Equipe de Triagem A SER PREENCHIDA PELO ESTAGIÁRIO","name"=>"encaminhamentoSugerido"];
			$this->col[] = ["label"=>"Motivo da urgência","name"=>"motivoUrgencia"];
			$this->col[] = ["label"=>"Indicação da Modalidade de atendimento","name"=>"tipoModalidadeAtendimento"];
			$this->col[] = ["label"=>"Data de realização da Triagem","name"=>"dataTriagem"];
			$this->col[] = ["label"=>"Nome do Estagiário Responsável pela Triagem","name"=>"alunos_id","join"=>"alunos,nome"];
			$this->col[] = ["label"=>"Andamento em","name"=>"andamento"];
			$this->col[] = ["label"=>"Andamento","name"=>"tipoAndamento"];
			$this->col[] = ["label"=>"Supervisor","name"=>"coordenadores_id","join"=>"coordenadores,nome"];
			$this->col[] = ["label"=>"Ciente da Equipe Técnica","name"=>"cienciaEquipe"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Nome do paciente','name'=>'pacientes_id','type'=>'select2','width'=>'col-sm-10','datatable'=>'pacientes,nome'];
			$this->form[] = ['label'=>'Encaminhamento','name'=>'tipoEncaminhamento','type'=>'select','width'=>'col-sm-4','dataenum'=>'Iniciativa própria;Vizinhos ou Amigos;Familiares ;Médico ou Terapeuta;Empresa/Órgão em que trabalha;Outra instituição de saúde/ socioassistencial/ escola'];
			$this->form[] = ['label'=>'Motivo do Encaminhamento','name'=>'motivoEncaminhamento','type'=>'textarea','width'=>'col-sm-7'];
			$this->form[] = ['label'=>'Queixa principal contextualizada','name'=>'queixa','type'=>'textarea','width'=>'col-sm-7'];
			$this->form[] = ['label'=>'O(a) paciente já fez tratamento psicoterápico?','name'=>'realizaTratamentoPsico','type'=>'radio','width'=>'col-sm-4','dataenum'=>'não;sim'];
			$this->form[] = ['label'=>'Se sim, por quanto tempo?','name'=>'tempoTratamentoPsico','type'=>'text','width'=>'col-sm-2'];
			$this->form[] = ['label'=>'Há outros membros da família sob tratamento psicoterápico e /ou psiquiátrico?','name'=>'familiaRealizaTratPsico','type'=>'radio','width'=>'col-sm-10','dataenum'=>'não;sim'];
			$this->form[] = ['label'=>'Se sim, especificar nomes dos familiares (Atentar para familiares em gerações anteriores)','name'=>'nomesFamiliares','type'=>'textarea','width'=>'col-sm-7'];
			$this->form[] = ['label'=>'O(A) paciente tem hábito de se auto-medicar?','name'=>'habitoAutoMedicar','type'=>'radio','width'=>'col-sm-10','dataenum'=>'não;sim'];
			$this->form[] = ['label'=>'Se sim, por quanto tempo?','name'=>'tempoAutoMedicacao','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Em que circunstâncias e qual tipo de medicamento utilizado?','name'=>'medicamentoUtilizado','type'=>'textarea','width'=>'col-sm-7'];
			$this->form[] = ['label'=>'O paciente faz uso de medicação psiquiátrica?','name'=>'medicacaoPsiquiatrica','type'=>'radio','width'=>'col-sm-10','dataenum'=>'não;sim'];
			$this->form[] = ['label'=>'Se sim, qual(is)?','name'=>'medicamentoPsiquiatrico','type'=>'textarea','width'=>'col-sm-7'];
			$this->form[] = ['label'=>'Há quanto tempo?','name'=>'tempoMedicamentoPsiquiatrico','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Identificar o último Médico Psiquiatra','name'=>'ultimoMedicoPsiquiatra','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Há histórico de internação psiquiátrica?','name'=>'historicoInternacao','type'=>'radio','width'=>'col-sm-10','dataenum'=>'não;sim'];
			$this->form[] = ['label'=>'Se sim, quando?','name'=>'quandoHistoricoInternacao','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'O tratamento psiquiátrico foi concluído?','name'=>'tratamentoConcluido','type'=>'radio','width'=>'col-sm-10','dataenum'=>'não;sim'];
			$this->form[] = ['label'=>'Qual o nome da Instituição de internação?','name'=>'nomeInstituicaoInternacao','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'O(a) paciente faz uso abusivo de drogas?','name'=>'usoAbusivoDrogas','type'=>'radio','width'=>'col-sm-10','dataenum'=>'não;sim'];
			$this->form[] = ['label'=>'Se sim, Quais as substâncias psicoativas utilizadas?','name'=>'substanciaPsicoativa','type'=>'textarea','width'=>'col-sm-7'];
			$this->form[] = ['label'=>'Atividade Profissional','name'=>'tipoAtividadeProfissional','type'=>'select','width'=>'col-sm-10','dataenum'=>'Ativo;Licenciado;Aposentado por invalidez;Desempregado'];
			$this->form[] = ['label'=>'Há caso de crianças e adolescentes','name'=>'temCriancaAdolescente','type'=>'radio','width'=>'col-sm-10','dataenum'=>'não;sim'];
			$this->form[] = ['label'=>'Período em que estuda','name'=>'periodoEstudo','type'=>'select','width'=>'col-sm-10','dataenum'=>'Matutino;Vespertino;Noturno'];
			$this->form[] = ['label'=>'Nome da escola','name'=>'nomeEscola','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Horários disponíveis para a psicoterapia','name'=>'horarioDisponivel','type'=>'time','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Síntese do Caso','name'=>'sinteseCaso','type'=>'textarea','width'=>'col-sm-7'];
			$this->form[] = ['label'=>'Encaminhamento sugerido pela Equipe de Triagem A SER PREENCHIDA PELO ESTAGIÁRIO','name'=>'encaminhamentoSugerido','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Pode aguardar o fluxo normal;URGENTE'];
			$this->form[] = ['label'=>'Motivo da urgência','name'=>'motivoUrgencia','type'=>'select','width'=>'col-sm-10','dataenum'=>'Afirma ideação suicida;Identifica-se ideação suicida;Possui histórico de ideação suicida;Possui histórico de tentativa de autoextermínio;Possui histórico de violência familiar contínua ;Uso abusivo de drogas psicoativas;Sem autonomia para auto-cuidado;Desempenho no trabalho se mantém instável;Transtornos mentais associados;Nível de estresse significativo nos últimos dias/meses;Tem se sentido ameaçado por situações de risco de morte;Tratamentos psiquiátricos não concluídos;Tratamento psiquiátrico em andamento;Manifesta necessidade de psicoterapia mais de uma vez por semana'];
			$this->form[] = ['label'=>'Indicação da Modalidade de atendimento','name'=>'tipoModalidadeAtendimento','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Individual;Grupo*;Familiar'];
			$this->form[] = ['label'=>'Data de realização da Triagem','name'=>'dataTriagem','type'=>'date','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Nome do Estagiário Responsável pela Triagem','name'=>'alunos_id','type'=>'select2','width'=>'col-sm-10','datatable'=>'alunos,nome'];
			$this->form[] = ['label'=>'Andamento em','name'=>'andamento','type'=>'date','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Andamento','name'=>'tipoAndamento','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Psicoterapia;Plantão Psicológico'];
			$this->form[] = ['label'=>'Supervisor','name'=>'coordenadores_id','type'=>'select2','width'=>'col-sm-10','datatable'=>'coordenadores,nome'];
			$this->form[] = ['label'=>'Ciente da Equipe Técnica','name'=>'cienciaEquipe','type'=>'text','width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Nome do paciente','name'=>'pacientes_id','type'=>'select2','width'=>'col-sm-2','datatable'=>'pacientes,nome'];
			//$this->form[] = ['label'=>'Encaminhamento','name'=>'tipoEncaminhamento','type'=>'select','width'=>'col-sm-3','dataenum'=>'Iniciativa própria;Vizinhos ou Amigos;Familiares ;Médico ou Terapeuta;Empresa/Órgão em que trabalha;Outra instituição de saúde/ socioassistencial/ escola'];
			//$this->form[] = ['label'=>'Motivo do Encaminhamento','name'=>'motivoEncaminhamento','type'=>'textarea','width'=>'col-sm-5'];
			//$this->form[] = ['label'=>'Queixa principal contextualizada','name'=>'queixa','type'=>'textarea','width'=>'col-sm-7'];
			//$this->form[] = ['label'=>'O(a) paciente já fez tratamento psicoterápico?','name'=>'realizaTratamentoPsico','type'=>'radio','width'=>'col-sm-4','dataenum'=>'não;sim'];
			//$this->form[] = ['label'=>'Se sim, por quanto tempo?','name'=>'tempoTratamentoPsico','type'=>'text','width'=>'col-sm-1'];
			//$this->form[] = ['label'=>'Há outros membros da família sob tratamento psicoterápico e /ou psiquiátrico?','name'=>'familiaRealizaTratPsico','type'=>'radio','width'=>'col-sm-10','dataenum'=>'não;sim'];
			//$this->form[] = ['label'=>'Se sim, especificar nomes dos familiares (Atentar para familiares em gerações anteriores)','name'=>'nomesFamiliares','type'=>'textarea','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'O(A) paciente tem hábito de se auto-medicar?','name'=>'habitoAutoMedicar','type'=>'radio','width'=>'col-sm-10','dataenum'=>'não;sim'];
			//$this->form[] = ['label'=>'Se sim, por quanto tempo?','name'=>'tempoAutoMedicacao','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Em que circunstâncias e qual tipo de medicamento utilizado?','name'=>'medicamentoUtilizado','type'=>'textarea','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'O paciente faz uso de medicação psiquiátrica?','name'=>'medicacaoPsiquiatrica','type'=>'radio','width'=>'col-sm-10','dataenum'=>'não;sim'];
			//$this->form[] = ['label'=>'Se sim, qual(is)?','name'=>'medicamentoPsiquiatrico','type'=>'textarea','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Há quanto tempo?','name'=>'tempoMedicamentoPsiquiatrico','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Identificar o último Médico Psiquiatra','name'=>'ultimoMedicoPsiquiatra','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Há histórico de internação psiquiátrica?','name'=>'historicoInternacao','type'=>'radio','width'=>'col-sm-10','dataenum'=>'não;sim'];
			//$this->form[] = ['label'=>'Se sim, quando?','name'=>'quandoHistoricoInternacao','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'O tratamento psiquiátrico foi concluído?','name'=>'tratamentoConcluido','type'=>'radio','width'=>'col-sm-10','dataenum'=>'não;sim'];
			//$this->form[] = ['label'=>'Qual o nome da Instituição de internação?','name'=>'nomeInstituicaoInternacao','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'O(a) paciente faz uso abusivo de drogas?','name'=>'usoAbusivoDrogas','type'=>'radio','width'=>'col-sm-10','dataenum'=>'não;sim'];
			//$this->form[] = ['label'=>'Se sim, Quais as substâncias psicoativas utilizadas?','name'=>'substanciaPsicoativa','type'=>'textarea','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Atividade Profissional','name'=>'tipoAtividadeProfissional','type'=>'select','width'=>'col-sm-10','dataenum'=>'Ativo;Licenciado;Aposentado por invalidez;Desempregado'];
			//$this->form[] = ['label'=>'Há caso de crianças e adolescentes','name'=>'temCriancaAdolescente','type'=>'radio','width'=>'col-sm-10','dataenum'=>'não;sim'];
			//$this->form[] = ['label'=>'Período em que estuda','name'=>'periodoEstudo','type'=>'select','width'=>'col-sm-10','dataenum'=>'Matutino;Vespertino;Noturno'];
			//$this->form[] = ['label'=>'Nome da escola','name'=>'nomeEscola','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Horários disponíveis para a psicoterapia','name'=>'horarioDisponivel','type'=>'time','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Síntese do Caso','name'=>'sinteseCaso','type'=>'textarea','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Encaminhamento sugerido pela Equipe de Triagem A SER PREENCHIDA PELO ESTAGIÁRIO','name'=>'encaminhamentoSugerido','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Pode aguardar o fluxo normal;URGENTE'];
			//$this->form[] = ['label'=>'Motivo da urgência','name'=>'motivoUrgencia','type'=>'select','width'=>'col-sm-10','dataenum'=>'Afirma ideação suicida;Identifica-se ideação suicida;Possui histórico de ideação suicida;Possui histórico de tentativa de autoextermínio;Possui histórico de violência familiar contínua ;Uso abusivo de drogas psicoativas;Sem autonomia para auto-cuidado;Desempenho no trabalho se mantém instável;Transtornos mentais associados;Nível de estresse significativo nos últimos dias/meses;Tem se sentido ameaçado por situações de risco de morte;Tratamentos psiquiátricos não concluídos;Tratamento psiquiátrico em andamento;Manifesta necessidade de psicoterapia mais de uma vez por semana'];
			//$this->form[] = ['label'=>'Indicação da Modalidade de atendimento','name'=>'tipoModalidadeAtendimento','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Individual;Grupo*;Familiar'];
			//$this->form[] = ['label'=>'Data de realização da Triagem','name'=>'dataTriagem','type'=>'date','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Nome do Estagiário Responsável pela Triagem','name'=>'alunos_id','type'=>'select2','width'=>'col-sm-10','datatable'=>'alunos,nome'];
			//$this->form[] = ['label'=>'Andamento em','name'=>'andamento','type'=>'date','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Andamento','name'=>'tipoAndamento','type'=>'radio','width'=>'col-sm-10','dataenum'=>'Psicoterapia;Plantão Psicológico'];
			//$this->form[] = ['label'=>'Supervisor','name'=>'coordenadores_id','type'=>'select2','width'=>'col-sm-10','datatable'=>'coordenadores,nome'];
			//$this->form[] = ['label'=>'Ciente da Equipe Técnica','name'=>'cienciaEquipe','type'=>'text','width'=>'col-sm-10'];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }



	    //By the way, you can still create your own method in here... :) 


	}