
 function getRandomInt1() {
var currentdate = new Date();
var min=currentdate.getSeconds();
var max=currentdate.getMilliseconds();
    return Math.floor(Math.random()*8* (max - min + 1)) + min;
}

 function getRandomInt() {
var currentdate = new Date();
var min=currentdate.getSeconds();
var max=currentdate.getMilliseconds();
    return Math.floor(Math.random()*8* (max - min + 1)) + min;
}
 	/*New Code*/
	function Getvalue(value) {
    
	   $(".orders .k-grid-content table tbody tr >td:first").css("background-color", value);
		
    }
var LOC_ID = '';
$(document).ready(function() {

  $("#divloading").kendoProgressBar({
    animation: false
  });
 

kendo.ui.progress($(".k-loading-image"), false),	
	loadLeft();
	
   function loadLeft()
   {
	   
	    var dataSourceleft = new kendo.data.DataSource({
    transport: {
     			read: { async: false, 
						 url:  locations+"/"+getRandomInt(),
						dataType: "json" ,
						cache:false
     				   }
    			},
	schema: { data: "data", total: "total" }
   });
  
   $("#gridLeft").kendoGrid({
	   
    dataSource: dataSourceleft,
	detailExpand: function(e) {
            this.collapseRow(this.tbody.find(' > tr.k-master-row').not(e.masterRow));
        },
  columns: [
          {field: "DESCRIPTION", title: "Location"}
		  
     ],mobile: true,columnMenu: true,
    
		detailTemplate: kendo.template($("#template").html()),
		detailInit: detailInit,
		dataBound: function() {
			$(".orders .k-grid-content table tbody tr").each(function(index, element) {
                $(this).find('td:first').css("background","red");
            });
			
		this.expandRow(this.tbody.find("tr.k-master-row").first());
		}
	   	
   });
   }
 });

function detailInit(e) {
var detailRow = e.detailRow;   LOC_ID=e.data.LOC_ID;
 var dataSource1 = new kendo.data.DataSource({
	 
    transport: {
     			read: {async: true,
				 		url: ststuses+e.data.LOC_ID+"/"+getRandomInt(),
	  					dataType: "json",
						cache:false  
     				   }
    			},
	schema: { data: "data", total: "total" }
   });
  
                                       
	detailRow.find(".orders").kendoGrid({
    dataSource: dataSource1,
  columns: [   
      //{   field: "COLOR_CODE", title: " ",template:'#=Getvalue(COLOR_CODE)#'},
			  {hidden: true, field: "COLOR_CODE" }, {hidden: true, field: "WORSTA_ID" , "menu": false  },
         {field: "CODE", title: "STATUS"},
		
					{field: "COUNT", title: "COUNT",template:' <span class="badge badge-inverse pull-right"  style="float:right">#= COUNT #</span>'} 
		 
     ],mobile: true,columnMenu: true,
     //height: 360,
		 detailTemplate: kendo.template($("#template1").html()),
		 detailInit: detailInit1,
		 detailExpand: function(e) {
		 
		// $(this).find(".k-detail-row .toolbar .Search").val("").trigger("KeyUp");
            this.collapseRow(this.tbody.find(' > tr.k-master-row').not(e.masterRow));
        },
		 dataBound: function() {
				
				$(".orders .k-grid-content table tbody tr").each(function(index, element) {
                $(this).find('td:first').css("background",$(this).find('td').eq(1).html());
            });
		 this.collapseRow(this.tbody.find("tr.k-master-row").first());
		 }
	  
   });

} 
			
function gridDataBound(e) {
    var grid = e.sender;
	if (grid.dataSource.total() == 0) {
        var colCount = grid.columns.length;
        $(e.sender.wrapper)
            .find('tbody')
            .append('<tr class="kendo-data-row"><td colspan="' + colCount + '" class="no-data">Sorry, no data :(</td></tr>');
    }
};
function detailInit1(e) {
var detailRow = e.detailRow;   WOSTATUS_ID=e.data.WORSTA_ID; var  selecteditem="aendss";
 var dataSource2 = new kendo.data.DataSource({
    transport: {
     			read: {
							async: true,
							//url: "<?//=base_url()?>mro/mroList/get_ro_records/"+LOC_ID+"/"+WOSTATUS_ID+"/"+currentdate.getSeconds(),
							//url:  "<?PHPbase_url()?>mro/mroList/get_ro_records/"+LOC_ID+"/"+WOSTATUS_ID+"",
	  					url: rorecords+LOC_ID+"/"+WOSTATUS_ID+"/"+selecteditem+"/"+getRandomInt(),
							dataType: "json",
							cache:false
						},
					   	parameterMap: function (options) 
					{
                        var object = {};
                        object.model = options.model;
                        object.page = options.page;
                        object.size = options.size;
                        object.skip = options.skip;
                        object.take = options.take;
                        object.sort = options.sort;
                        return options;
                    }
    			},serverPaging: true,pageSize: 5,pageSizes:false,serverSorting: true,
				
                   
	schema: { data: "data", total: "total" }
	
   });
                                    
	detailRow.find(".orders1").kendoGrid({
		
		dataBound: function() {
		   // console.log("goog");
			 $("#gridLeft .orders1 table tbody tr").each(function(index, element) {
              detailRow.find(".orders1 .k-grid-toolbar .Search").attr("WORSTA_ID",detailRow.find(".orders1").find('td:eq(9)').html());
              detailRow.find(".orders1 .k-grid-toolbar .Search").attr("LOC_ID",detailRow.find(".orders1").find('td:eq(10)').html());
 			//	console.log(detailRow.find(".orders1").find('td:eq(1)').html());			
			//console.log($(this).find('td:eq(1)').html());
              
			   $(this).css("cursor","pointer"); 
			 
			  
            });
		$("#gridLeft .orders1 table thead tr th").each(function(index, element) {
				
				$(this).off('click');
				});
		 
		 },
		
    dataSource: dataSource2,
  columns: [     {field: "RONUMBER", title: "RO #"},
				 {field: "RODATE", title: "RO DATE"},
		    	 {field: "CUSTOMERNAME",title:"CUSTOMER"}  ,
				 {field: "MOBILELOCATION", title: "LOCATION"},
				 {field: "UNITNUMBER", title: "UNIT #"} ,
				 {field: "PREFERREDNO", title: "PREFERRED #"},
				 {field: "COMPLETEDDATE", title: "COMPLETED DATE"},
				 {hidden: true, field: "WORORD_ID" , "menu": false  },
				 {hidden: true, field: "UNI_ID", "menu": false  },
				 {hidden: true, field: "WORSTA_ID", "menu": false  },
				 {hidden: true, field: "LOC_ID", "menu": false  },
				 {field: "PO_NUMBER", title: "PO #"},
				 {field: "CUSTOMER_BILL_TO", title: "CUSTOMER BILL TO"},
				 {field: "UNIT_NEW_BARCODE", title: "UNIT BARCODE #"},
				 //{field: "CUSTOMER_INVOICE_TO", title: "CUSTOMER INVOICE TO"}
				
				
     ],mobile: true,
      height: 250,
	  resizable:true,
      
	  
	  columnMenu: true,
           // reorderable: true,
	  toolbar: kendo.template($("#Searchtemplate").html()),
	  sortable: {
                    mode: "single",
                    allowUnsort: false
                },
	  pageable: {
				refresh: true,
				pageSize: 6,
				pageSizes:true,
				buttonCount:5
                }
		

   });widths();

}
 //$('#gridLeft .k-detail-row .toolbar .clearable').clearSearch({ callback: function() { console.log("cleared"); alert("aa");
 /* start of search for listing*/
 
$(document).on("click", "#gridLeft .k-detail-row .toolbar .po_number", function(){ 
 	
	$(this).closest(".toolbar").find('.Search').trigger('keyup');
	widths();
});
 
 $(document).on("keyup", "#gridLeft .k-detail-row .toolbar .Search", function(){ 
 	
    var selecteditem =  $.trim($(this).val()).toUpperCase(); 
    var kgrid =   $(this).closest('.orders1').data("kendoGrid");//$(this).closest('.orders1').html("");
	 
	WOSTATUS_ID=$(this).attr("WORSTA_ID");
	  if(typeof WOSTATUS_ID =='undefined')
	    return false;
		LOC_ID=$(this).attr("LOC_ID");
    selecteditem = selecteditem.toUpperCase(); //;console.log(selecteditem);
	var po_number=$(this).closest(".toolbar").find('.po_number').is(":checked");
    if(selecteditem=="")
	   selecteditem="aendss"; 
	   
	  $(this).closest('.orders1').data("kendoGrid").destroy(); 
	   var currentdate = new Date();
 var dataSource212 = new kendo.data.DataSource({
    transport: {
     			read: {async: true,
      					url: rorecords+LOC_ID+"/"+WOSTATUS_ID+"/"+selecteditem+"/"+po_number+"/"+currentdate.getSeconds(),
	  					 dataType: "json",
						 cache:false,
						 parameterMap: function (options) {
                         var object = {};
                         object.model = options.model;
                         object.page = options.page;
                         object.size = options.size;
                         object.skip = options.skip;
                         object.take = options.take;
                         object.sort = options.sort;
                         return options;
                         }, 
						 contentType: 'application/json; charset=utf-8',
						 complete: function(data,xhr,textStatus)
						 {
							 widths();
							 if (data.status == 200) {
        var redirect = null;
        try {
            redirect = $.parseJSON(xhr.responseText).redirect;
            if (redirect) {
                window.location.href = redirect;
            }
        } catch (e) {
            return;
        }
    }
							 
						 }
     				   }
    			}, 
				serverPaging: true,pageSize: 5,pageSizes:false,serverSorting: true,
	schema: { data: "data", total: "total" }
	
   });
   
                                
	$(this).closest('.orders1').kendoGrid({
		dataBound: function() {
		 
			 $("#gridLeft .orders1 table tbody tr").each(function(index, element) {
			 widths();
			 
			 
              
            });
			$("#gridLeft .orders1 table thead tr th").each(function(index, element) {
				
				$(this).off('click');
				});
		
		 
		 }, 
		
    dataSource: dataSource212,
  columns: [   {field: "RONUMBER", title: "RO #"},
				 {field: "RODATE", title: "RO DATE"},
		    	 {field: "CUSTOMERNAME",title:"CUSTOMER"}  ,
				 {field: "MOBILELOCATION", title: "MOBLICATION"},
				 {field: "UNITNUMBER", title: "UNIT #"} ,
				 {field: "PREFERREDNO", title: "PREFERRED #"},
				 {field: "COMPLETEDDATE", title: "COMPLETEDDATE"},
				 {hidden: true, field: "WORORD_ID" , "menu": false  },
				 {hidden: true, field: "UNI_ID", "menu": false  },
				 {hidden: true, field: "WORSTA_ID", "menu": false  },
				 {hidden: true, field: "LOC_ID" , "menu": false  },
				 {field: "PO_NUMBER", title: "PO #"},
				 {field: "CUSTOMER_BILL_TO", title: "CUSTOMER BILL TO"},
				 {field: "UNIT_NEW_BARCODE", title: "UNIT BARCODE #"},
				// {field: "CUSTOMER_INVOICE_TO", title: "CUSTOMER INVOICE TO"}
				
     ],
	 //sort: {field: "RODATE", dir: "asc"},
	 mobile: true,
     height: 240,
		resizable:true,
		scrollable: true,
		//sortable:true,
		columnMenu: true,serverSorting: true,
		sortable: {
                    mode: "single",
                    allowUnsort: false
                },
		 pageable: {
                    //refresh: true,
                    pageSize: 5,
					pageSizes:true,
					buttonCount:6,
					change: function(e) {
					
      }
                }
				
				
		

   });widths();

});

$(document).on("click", "#gridLeft .k-detail-row .toolbar .clear", function(){ 
 $(this).parent('div').find("input[type=text]").val("").trigger("keyup");
  
});
$(document).on("dblclick", ".orders1 table tbody tr", function(e)
	{
		var workorder_id =$(this).find('td:eq(7)').html();
			//var unit_id =$(this).find('td:eq(8)').html();
			//alert(workorder_id);alert(unit_id);
			if(workorder_id =='' )
			{
				return false;
			}
			else
			{
				var url = "Mro/update_ro/index/"+workorder_id+"";
				window.location.href = base_url+url;
			}
		
	
		$("#divLoading").show();
		var url = "Mro/update_ro/index/"+workorder_id+"";
		window.location.href = base_url+url;
	
});





//////////////////////global search code //////////////////

Ext.onReady(function(){

	var preferred_store = new Ext.data.JsonStore({
		paramsAsHash: true,
		root: "fields",
		url: globalsearch,
		idProperty: "uni_id",
		totalProperty: "totalCount",
		//paramOrder: ["start", "limit", "query", "cus_id"],
		fields: ["RONUMBER","RODATE","PREFERREDNO","UNITNUMBER","COMPLETEDDATE","BARCODE_NUMBER","WORORD_ID","UNI_ID","WO_WS_STATUS","MOBILELOCATION","PO_NUMBER"]
			
		});
				
		var pref = new Ext.form.ComboBox({
			store: preferred_store,
			displayField: "PREFERRED_NUMBER",
			valueField: "UNI_ID",
			typeAhead: false,
			name: "preferred_name",
			fieldLabel: "Preferred #",
			loadingText: "Searching...",
			allowSearchMinChars: 3,
			selectOnFocus: false,
			forceSelection: false,
			validateOnBlur: false,
			anchor: "100%",
			pageSize: 7,
			minChars: 3,
			width:170,
			itemSelector: "div.search-item",
			hideTrigger: true,
			
		   tpl: new Ext.XTemplate('<tpl for="."><div class="search-item">',  "<B>RO #: </B>{RONUMBER}<br/>",  "<B>BARCODE #: </B>{BARCODE_NUMBER}<br/>", "<B>PREFERRED #:</B> {PREFERREDNO}<br/>","<B>UNIT #: </B> {UNITNUMBER}<br/>", "<B>COMPLETED DATE : </B> {COMPLETEDDATE}<br/>" ,"<B>RO STATUS : </B> {WO_WS_STATUS}<br/>" ,"<B>LOCATION : </B> {MOBILELOCATION}<tpl if=\"UNITNUMBER == null\">n/a</tpl><br/>","<B>PO # : </B> {PO_NUMBER}<tpl if=\"PO_NUMBER == null\">n/a</tpl><br/>", "</div></tpl>"),
			applyTo: 'rtmi_search', //input field ID 
			onSelect: function(fields){ 
			
			// override default onSelect to do redirect
					if(fields.data.RONUMBER == 'null' || fields.data.RONUMBER == null)
						$("#rtmi_search").val(fields.data.RONUMBER);
					else
						$("#rtmi_search").val(fields.data.RONUMBER);
						   
					$("#workorder_id").val(fields.data.WORORD_ID);
					$("#unit_id").val(fields.data.UNI_ID);
					
					
					mro_update();
					this.collapse();
				}

		});
	
	widths();
	});
	
function  mro_update()
	{
		var workorder_id = $('#workorder_id').val();
		var unit_id   = $('#unit_id').val();
		if(workorder_id =='' )
			{
				return false;
			}
		else
			{
				var url = "Mro/update_ro/index/"+workorder_id+"";
				window.location.href = base_url+url;
			}
	}

$("#gridLeft").on("click", ".k-master-row", function(e) {
	//alert('left');
  var grid = $(".orders").data("kendoGrid");
  
  if ($(this).find(".k-icon").hasClass("k-minus")) {
    grid.collapseRow(this);
  } else {
    grid.expandRow(this);
  }
  
});
////////////////////code for tooltip////////////////////////////
$(document).delegate('#gridLeft .orders1 table tbody tr', 'mouseover', function() 
{
	var COMPLETE_DATE = $(this).find('td:eq(6)').html();
	if(COMPLETE_DATE == '')
	{
		COMPLETE_DATE = 'N/A ';
	}
	 
	if($(this).hasClass('audit_log'))
 		return false;
	$(this).addClass('masterTooltip');
 	var content = "<table style=width:300px>"
 
    content += '<tr><td>RO NUMBER</td><td>' + ':' +  $(this).find('td:eq(0)').html() + '</td>';
	content += '<tr><td>FACILITY</td><td>' + ':' +  $(this).find('td:eq(3)').html() + '</td>';
	content += '<tr><td>PREFERRED #</td><td>' + ':' +  $(this).find('td:eq(5)').html() + '</td></tr>';
    content += '<tr><td>CUSTOMER</td><td>' + ':' +  $(this).find('td:eq(2)').html() + '</td></tr>';
	content += '<tr><td>UNIT #</td><td>' + ':' +  $(this).find('td:eq(4)').html() + '</td></tr>';
	content += '<tr><td>COMPLETED DATE </td><td>' + ':' +  COMPLETE_DATE + '</td></tr>'; 
  	content += "</table>"
      	 $(this).data('tipText', content).removeAttr('content');
         $('<p class="tooltip"></p>').append(content) 
        .appendTo('body')
        .fadeIn('slow');
});
$(document).delegate('.masterTooltip', 'mouseout', function(e) 
{
   $(this).attr('content', $(this).data('tipText'));
   $('.tooltip').remove();
});
$(document).delegate('.masterTooltip', 'mousemove', function(e) 
{
	var mousex = e.pageX + 20; //Get X coordinates
	var mousey = e.pageY + 10; //Get Y coordinates
	$('.tooltip')
	.css({ top: mousey, left: mousex });
});

///////////////loader////////////////////////
$(".loader").click(function()
{
	//$("#divLoading").show()
});

 

  function widths()
	{
		$('#rtmi_search').prop('style',"width:262px;");
	}
window.setInterval(function() 
{
	$.ajax({
        type:'POST',
        url: session_check,
        success: function(data)
        {
			if(data != 'login')
				location.href=loginLogout;
		}
	 });
    
},50000);
$(window).on('beforeunload',function() {
	
    $("#divLoading").show();
});

$(window).on('unload',function() {
	
    $("#divLoading").hide();
});