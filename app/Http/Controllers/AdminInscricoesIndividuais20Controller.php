<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminInscricoesIndividuais20Controller extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "id,desc";
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
			$this->table = "inscricoes_individuais";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Nome do paciente","name"=>"pacientes_id","join"=>"pacientes,nome"];
			$this->col[] = ["label"=>"Data","name"=>"data"];
			$this->col[] = ["label"=>"Modalidade","name"=>"modalidade"];
			$this->col[] = ["label"=>"Numero do Prontuário","name"=>"numeroProntuario"];
			$this->col[] = ["label"=>"Nome do Responsável","name"=>"nomeResponsavel"];
			$this->col[] = ["label"=>"Parentesco","name"=>"parentescoResponsavel"];
			$this->col[] = ["label"=>"RG","name"=>"rgResponsavel"];
			$this->col[] = ["label"=>"CPF","name"=>"cpfResponsavel"];
			$this->col[] = ["label"=>"Profissão/Ocupação","name"=>"profissaoResponsavel"];
			$this->col[] = ["label"=>"Renda","name"=>"rendaResponsavel"];
			$this->col[] = ["label"=>"Paciente interno - UDF","name"=>"pacienteInterno"];
			$this->col[] = ["label"=>"Aluno do curso","name"=>"nomeCurso"];
			$this->col[] = ["label"=>"Professor de","name"=>"professor"];
			$this->col[] = ["label"=>"Funcionário do setor","name"=>"setorFuncionario"];
			$this->col[] = ["label"=>"Paciente da comunidade","name"=>"pacienteComunidade"];
			$this->col[] = ["label"=>"Encaminhado por","name"=>"responEncaminhamento"];
			$this->col[] = ["label"=>"Disponibilidade para atendimento - Dias","name"=>"diaSemama"];
			$this->col[] = ["label"=>"Horário","name"=>"horario"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Nome do paciente','name'=>'pacientes_id','type'=>'select2','validation'=>'required','width'=>'col-sm-10','datatable'=>'pacientes,nome'];
			$this->form[] = ['label'=>'Data','name'=>'data','type'=>'date','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Modalidade','name'=>'modalidade','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Criança;Adolescente;Adulto;Casal;Família'];
			$this->form[] = ['label'=>'Numero do Prontuário','name'=>'numeroProntuario','type'=>'number','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Nome do Responsável','name'=>'nomeResponsavel','type'=>'text','width'=>'col-sm-10','placeholder'=>'Nome do Responsável'];
			$this->form[] = ['label'=>'RG','name'=>'rgResponsavel','type'=>'text','width'=>'col-sm-10','placeholder'=>'RG do Responsável'];
			$this->form[] = ['label'=>'CPF','name'=>'cpfResponsavel','type'=>'text','width'=>'col-sm-10','placeholder'=>'CPF do Responsável'];
			$this->form[] = ['label'=>'Parentesco','name'=>'parentescoResponsavel','type'=>'text','width'=>'col-sm-10','placeholder'=>'Parentesco do Responsável'];
			$this->form[] = ['label'=>'Renda','name'=>'rendaResponsavel','type'=>'money','width'=>'col-sm-10','placeholder'=>'Renda do Responsável'];
			$this->form[] = ['label'=>'Profissão/Ocupação','name'=>'profissaoResponsavel','type'=>'text','width'=>'col-sm-10','placeholder'=>'Profissão/Ocupação do Responsável'];
			$this->form[] = ['label'=>'Paciente interno - UDF','name'=>'pacienteInterno','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'sim;não'];
			$this->form[] = ['label'=>'Aluno do curso','name'=>'nomeCurso','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Professor de','name'=>'professor','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Funcionário do setor','name'=>'setorFuncionario','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Paciente da comunidade','name'=>'pacienteComunidade','type'=>'checkbox','width'=>'col-sm-10','dataenum'=>'sim;não'];
			$this->form[] = ['label'=>'Encaminhado por','name'=>'responEncaminhamento','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Disponibilidade para atendimento - Dias','name'=>'diaSemama','type'=>'select','width'=>'col-sm-10','dataenum'=>'Segunda-feira;Terça-feira;Quarta-feira;Quinta-feira;Sexta-feira;Sábado;Domingo'];
			$this->form[] = ['label'=>'Horário','name'=>'horario','type'=>'time','width'=>'col-sm-10'];
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