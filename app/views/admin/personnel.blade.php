@section('content')

<div class="depcontent">
	<div style="position: relative">
		<button id="clear-filters" class="btn btn-default btn-sm" style="position: absolute; top: 4px; right: 4px; z-index: 999">clear filters</button>
		<div id="grid" styel></div>
	</div>
</div>

@stop

@section('style')
<style type="text/css">
	.k-grid .k-button.k-grid-edit,
	.k-grid .k-button.k-grid-update,
	.k-grid .k-button.k-grid-cancel,
	.k-grid .k-button.k-grid-delete
	{
		min-width: 0;
		margin: 0.16em;
	}

	#grid
	{
		font-size: 14px;
	}

	#grid [role="gridcell"]
	{
		font-size: 13px;
	}

	#grid .k-grid-edit-row td
	{
		vertical-align: top;
		min-height: 50px;
	}

	#grid .k-tooltip
	{
		position: relative;
	}

	.grid-align-center
	{
		text-align: center;
	}

	.k-grid-filter.k-state-active {
		color: #fff;
		background-color: #1984c8;
		border-color: #1984c8;
	}
</style>
@stop

@section('script')
<script>
	var dataSource = new kendo.data.DataSource({
		transport: {
			create: {
				dataType: "json",
				url     : "/api/json/personnel/create",
				type    : "post",
				headers : {'X-CSRF-Token': '{{{ Session::token() }}}'}
			},
			read: {
				dataType: "json",
				url     : "/api/json/personnel/read",
				type    : "get"
			},
			update: {
				dataType: "json",
				url     : "/api/json/personnel/update",
				type    : "post",
				headers : {'X-CSRF-Token': '{{{ Session::token() }}}'},
				complete: function(e) {
					//dataSource.read(); 
				}
			},
			destroy: {
				dataType: "json",
				url     : "/api/json/personnel/delete",
				type    : "post",
				headers : {'X-CSRF-Token': '{{{ Session::token() }}}'}
			}
		},
		pageSize: 10,
		serverPaging: true,
		serverFiltering: true,
		schema: {
			model: {
				id: "id",
				fields: {
					id         : { editable: false, nullable: false },
					kimlik     : { type: "string", validation: { required: true } },
					gorev_id   : { type: "string", validation: { required: true }, dataValue: 5 },
					firstname  : { type: "string" },
					lastname   : { type: "string" },
					department : { type: "string", validation: { required: true } },
					email      : { type: "string" }
				}
			},
			data : "data",
			total: "total"
		}
	});

var job_names = [
{"value": 5,  "text": "asistan"},
{"value": 36, "text": "sekreter"},
{"value": 48, "text": "öğretim üyesi"}
];

function job_list(container, options)
{
	$('<input required name="gorev_id" style="width:130px;">')
	.appendTo(container)
	.kendoDropDownList({
		dataTextField : "text",
		dataValueField: "value",
		optionLabel: "görev seçiniz...",
		dataSource: job_names
	});
}

function department_list(container, options)
{
	$('<input required name="department" style="width:300px;">')
	.appendTo(container)
	.kendoComboBox({
		placeholder   : "bölüm seçiniz",
		dataTextField : "department",
		dataValueField: "department",
		filter        : "contains",
		autoBind      : false,
		suggest       : true,
		dataSource: {
			serverFiltering: true,
			transport: {
				read: {
					dataType: "json",
					url     : "/api/json/department/read",
					type    : "get"
				}
			}
		}
	});
}

$(document).ready(function(){
	$("#grid").kendoGrid({
		dataSource     : dataSource,
		pageable       : {
			pageSizes: [10, 20, 50],
			refresh: true,
			input: true,
		},
		toolbar        : [{name: "create", text: "new"}],
		sortable       : false,
		scrollable     : false,
		filterable     : { extra: false },
		editable       : "inline",
		columns        : [
		{ field: "kimlik",        title: "kimlik", width: 60, attributes: { style: "text-align: center" }, filterable: { operators: { string: { eq : "equal", startswith: "starts" } } }},
		{ field: "firstname",     title: "adı",    width: 100, filterable: { operators: { string: { eq : "equal", startswith: "starts", contains: "contains" } } }},
		{ field: "lastname",      title: "soyadı", width: 120, filterable: { operators: { string: { eq : "equal", startswith: "starts", contains: "contains" } } }},
		{ field: "gorev_id",      title: "görev",  width: 100, editor: job_list, values: job_names, filterable: false},
		{ field: "department",    title: "bölüm",  editor: department_list,  filterable: { operators: { string: { startswith: "starts", contains : "contains"} } }},
		{ field: "email",         title: "email",  filterable: { operators: { string: { startswith: "starts", contains : "contains"} } }},

		{ command: [{name: "edit", text: {edit: "", update: "", cancel: ""}}, {name: "destroy", text: ""}],   title: "&nbsp;", width: 90,  attributes: { style: "text-align: center; padding: .4em 0" } }
		]
	});

});

$("#clear-filters").on("click", function(){
	$("#grid").data("kendoGrid").dataSource.filter([]);
});
</script>
@stop