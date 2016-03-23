 
 	/*New Code*/
	function Getvalue(value) {
    
	   $(".orders .k-grid-content table tbody tr >td:first").css("background-color", value);
		
    }
var LOC_ID = '';var AGRSTA_ID = '';
$(document).ready(function() {
	 $("#divloading").kendoProgressBar({
    animation: false
  });
	kendo.ui.progress($(".k-loading-image"), false),
	loadLeft();
	loadright();
	
   function loadLeft()
   {
   var currentdate = new Date();

	    var dataSourceleft = new kendo.data.DataSource({
    transport: {
     			read: { async: true, 
      					url:  inboundlocation+"/"+getRandomInt(),
	  					dataType: "json"  
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
          {field: "DESCRIPTION", title: "OUTBOUND"}
		  
     ],mobile: true,
     //height: $(window ).height() - 123,
		detailTemplate: kendo.template($("#template").html()),
		detailInit: detailInit,
		dataBound: function() {
			$(".orders .k-grid-content table tbody tr").each(function(index, element) {
                $(this).find('td:first').css("background","red");
            });
			//console.log(this.tbody.find("tr.k-master-row").html());
		this.expandRow(this.tbody.find("tr.k-master-row").first());
		}
	   	
   });
   }
   function loadright()
   {var currentdate = new Date();
	    var dataSourceright = new kendo.data.DataSource({
    transport: {
     			read: { async: true,
      					url: inboundlocation+"/"+getRandomInt(),
	  					dataType: "json"  
     				   }
    			},
	schema: { data: "data", total: "total" }
   });
  
   $("#gridRight").kendoGrid({
	   
    dataSource: dataSourceright,
	detailExpand: function(e) {
            this.collapseRow(this.tbody.find(' > tr.k-master-row').not(e.masterRow));
        },
  columns: [
         {field: "DESCRIPTION", title: "INBOUND" }
		  
     ],mobile: true,
     //height: $(window ).height() - 123,
		detailTemplate: kendo.template($("#templateright").html()),
		detailInit: detailInitright,
		
		dataBound: function() {
		this.expandRow(this.tbody.find("tr.k-master-row").first());
		}

   });
   }
 });
 // function GetRandomNum()
 // { 
 // return Math.floor(Math.random() * 655506);
 // }
function getRandomInt() {
var currentdate = new Date();
var min=currentdate.getSeconds();
var max=currentdate.getMilliseconds();
    return Math.floor(Math.random()*8* (max - min + 1)) + min;
}
function detailInit(e) {
var detailRow = e.detailRow;   LOC_ID=e.data.LOC_ID;
 
 
 var dataSource1 = new kendo.data.DataSource({
	 
    transport: {
     			read: {async: true,
      					url: tcmi_Out_statuses+e.data.LOC_ID+"/"+getRandomInt(),
	  					dataType: "json"  
     				   }
    			},
	schema: { data: "data", total: "total" }
   });
  
                                       
	detailRow.find(".orders").kendoGrid({
    dataSource: dataSource1,
  columns: [   
      //{   field: "COLOR_CODE", title: " ",template:'#=Getvalue(COLOR_CODE)#'},
			  {hidden: true, field: "COLOR_CODE" }, {hidden: true, field: "AGRSTA_ID" }, {hidden: true, field: "LOC_ID" },
         {field: "STATUS", title: "STATUS"},
		
					{field: "COUNT", title: "COUNT",template:' <span class="badge badge-inverse pull-right"  style="float:right">#= COUNT #</span>'} 
		 
     ],mobile: true,
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
var detailRow = e.detailRow;   AGRSTA_ID=e.data.AGRSTA_ID;

LOC_ID=e.data.LOC_ID;
//console.log(e.detailRow);console.log(e.data);
	 var  selecteditem="aends"; 

var currentdate = new Date();
 var dataSource2 = new kendo.data.DataSource({
    transport: {
     			read: {async: true,
      					url:  out_bounddetail+LOC_ID+"/"+AGRSTA_ID+"/"+selecteditem+"/"+getRandomInt(),
	  					dataType: "json"  , contentType: 'application/json; charset=utf-8'
     				   },
					    parameterMap: function (options) {
                        var object = {};
                        object.model = options.model;
                        object.page = options.page;
                        object.size = options.size;
                        object.skip = options.skip;
                        object.take = options.take;
                        object.sort = options.sort;
                        return options;
                    }
	
    			},serverPaging: true,pageSize: 5,serverSorting: true,
				 requestStart: function () {
				
				
                        kendo.ui.progress($("#divLoading"), false);
						
                    },
                    requestEnd: function () { //$(".k-loading-mask").hide(); //alert('requestEnd');
                        kendo.ui.progress($("#divLoading"), true);

                    },
	schema: { data: "data", total: "total" }
	
   });
  
                                       
	detailRow.find(".orders1").kendoGrid({
		dataBound: function() {
		   // console.log("goog");
			 $("#gridLeft .orders1 table tbody tr").each(function(index, element) {
              detailRow.find(".orders1 .k-grid-toolbar .Search").attr("AGRSTA_ID",detailRow.find(".orders1").find('td:eq(1)').html());
			    detailRow.find(".orders1 .k-grid-toolbar .Search").attr("AGRSTA_ID",detailRow.find(".orders1").find('td:eq(1)').html());
			   detailRow.find(".orders1 .k-grid-toolbar .clear").attr("LOC_ID",detailRow.find(".orders1").find('td:eq(13)').html());
			      detailRow.find(".orders1 .k-grid-toolbar .Search").attr("LOC_ID",detailRow.find(".orders1").find('td:eq(13)').html());
 			//	console.log(detailRow.find(".orders1").find('td:eq(1)').html());			
			//console.log($(this).find('td:eq(1)').html());
               var REJECTED_FLAG =  $(this).find('td:eq(8)').html();
			   var PRE_INSPECTION_FLAG =  $(this).find('td:eq(9)').html();
			   var VOID_DATE =  $(this).find('td:eq(10)').html();
			   var AGRSTA_ID =  $(this).find('td:eq(2)').html();
			   $(this).css("cursor","pointer"); 
				if(REJECTED_FLAG == 'Y')
				{
				   $(this).find('td:eq(3)').css("background","#E00000"); 
				}
			    else if(PRE_INSPECTION_FLAG == 'Y' )
				{
				   $(this).find('td:eq(3)').css("background","#88F888"); 
				}
				else if(VOID_DATE != '')
				{
				   $(this).find('td:eq(3)').css("background","#CECECE"); 
				}
            });
		
		 
		 },
		
    dataSource: dataSource2,
  columns: [    {hidden: true, field: "MASAGR_ID" },
                { hidden: true, field: "AGRSTA_ID" },
				//{ command: { text: "Log", click: showDetails },width:40},
   
      	        {field: "UNIT_NUMBER", title: "UNIT #",width:60},
				{field: "RTMI_NUMBER", title: "RTMI #",width:100},
		    	 {field: "RTMI_TYPE",title:"RTMI TYPE",width:70}  ,
				 {field: "KANDO_RTMI_DATE", title: "RTMI DATE",width:80},
				 {field: "CUSTOMER_CODE", title: "CUSTOMER",width:80} ,
				 {field: "UNIT_PREFERRED_NUMBER", title: "PREFERRED #"},
				 { hidden: true, field: "REJECTED_FLAG" },
				{ hidden: true, field: "PRE_INSPECTION_FLAG" },
				{ hidden: true, field: "VOID_DATE" },
				 { hidden: true, field: "UNIT_BARCODE_NUMBER" },
				{ field: "KENDO_OUTBOUND_DATE",title: "OUTBOUND DATE"},  { hidden: true, field: "LOC_ID_OUTBOUND" }
				
     ],
	// sort: {field: "KANDO_RTMI_DATE", dir: "asc"},
	 mobile: true,
     height: 240,
		resizable:true,
		scrollable: true,
		sortable: true,
		//filterable: true,
	     sortable: {
                    mode: "single",
                    allowUnsort: false
                },
		toolbar: kendo.template($("#Searchtemplate").html()), 
		   pageable: {
                    //refresh: true,
                    pageSizes: true,
                    buttonCount: 6,
                  //  messages: {
                   //     display: "Showing {0}-{1} from {2} Provider Contacts ",
                    //    empty: "No RTMI Match the Filter Criteria",
                    //    itemsPerPage: "Record per page"
                    //}
                }

   });

}
 $(document).on("click", "#gridRight .k-detail-row .toolbar .clear", function(){ 
    $(this).parent('div').find("input[type=text]").val("").trigger("keyup");
});
$(document).on("click", "#gridLeft .k-detail-row .toolbar .clear", function(){ 
 $(this).parent('div').find("input[type=text]").val("").trigger("keyup");
  
});
$(document).on("click", "#gridLeft .k-detail-row .toolbar .clears", function(){ 
     $(this).parent('div').find("input[type=text]").val("");//.trigger("keyup");
	
	  var selecteditem = "aends";// $.trim($(this).parent('div').find("input[type=text]").val("")).toUpperCase(); 
    var kgrid =   $(this).closest('.orders1').data("kendoGrid");//$(this).closest('.orders1').html("");
	 
	AGRSTA_ID=$(this).attr("AGRSTA_ID");
	  if(typeof AGRSTA_ID =='undefined')
	    return false;
    selecteditem = selecteditem.toUpperCase(); //;console.log(selecteditem);
    
	   selecteditem="aends"; 
	   var currentdate = new Date();
 var dataSource212 = new kendo.data.DataSource({
    transport: {
     			read: {async: true,
      					//url:  "<?=base_url()?>rtmi/rtmi_cando/get_rtmi_out_bound/"+LOC_ID+"/"+e.data.AGRSTA_ID+"",
						url: out_bounddetail+LOC_ID+"/"+AGRSTA_ID+"/"+selecteditem+"/"+getRandomInt(),
	  					dataType: "json"  , contentType: 'application/json; charset=utf-8',
						 complete: function(data,xhr,textStatus)
						 {if (data.status == 200) {
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
							 //console.log(data.status);
						 }
     				   }
    			},serverPaging: true,pageSize: 5,
	schema: { data: "data", total: "total" }
	
   });
  
   // console.log($(this).closest('.orders1').find(".k-grid-content").html(""));//; return false;
	  //.find('tbody')  .append('<tr class="kendo-data-row"><td colspan=class="no-data">Sorry, no data :(</td></tr>').html();                                 
	$(this).closest('.orders1').kendoGrid({
		dataBound: function() {
		 
			 $("#gridLeft .orders1 table tbody tr").each(function(index, element) {
			 
               var REJECTED_FLAG =  $(this).find('td:eq(8)').html();
			   var PRE_INSPECTION_FLAG =  $(this).find('td:eq(9)').html();
			   var VOID_DATE =  $(this).find('td:eq(10)').html();
			   $(this).css("cursor","pointer"); 
			   if(REJECTED_FLAG == 'Y')
			   {
				   $(this).find('td:eq(3)').css("background","#E00000"); 
				}
				else if(PRE_INSPECTION_FLAG == 'Y')
			   {
				   $(this).find('td:eq(3)').css("background","#88F888"); 
				}
				else if(VOID_DATE != '')
			   {
				   $(this).find('td:eq(3)').css("background","#CECECE"); 
				}
            });
		
		 
		 },
		
    dataSource: dataSource212,
  columns: [    {hidden: true, field: "MASAGR_ID" },
                { hidden: true, field: "AGRSTA_ID" },
				 
                //  { command: { text: "Log", click: showDetails },width:40},
   
      	        {field: "UNIT_NUMBER", title: "UNIT #",width:60},
				{field: "RTMI_NUMBER", title: "RTMI #",width:100},
		    	 {field: "RTMI_TYPE",title:"RTMI TYPE",width:70}  ,
				 {field: "KANDO_RTMI_DATE", title: "RTMI DATE",width:80},
				 {field: "CUSTOMER_CODE", title: "CUSTOMER",width:80} ,
				 {field: "UNIT_PREFERRED_NUMBER", title: "PREFERRED #"},
				 { hidden: true, field: "REJECTED_FLAG" },
				{ hidden: true, field: "PRE_INSPECTION_FLAG" },
				{ hidden: true, field: "VOID_DATE" },
				 { hidden: true, field: "UNIT_BARCODE_NUMBER" },
				{ field: "KENDO_OUTBOUND_DATE",title: "OUTBOUND DATE"} 
				
     ],sort: {field: "KANDO_RTMI_DATE", dir: "asc"},
	 mobile: true,
     height: 240,
		resizable:true,
		scrollable: true,
		sortable: {
                    mode: "single",
                    allowUnsort: false
                },
		//filterable: true,
		//toolbar: kendo.template($("#Searchtemplate").html()), 
		 pageable: {
                    //refresh: true,
                    pageSize: 5,
					pageSizes:true,
					buttonCount:3
					//change:function(e){
						   
                   //console.log("grid pager clicked!");
                 //}
                }
		

   });

  
});
 
 function onChangeSelection() {
  // alert('oh mon dieu');
    $("#gridLeft .orders1").data("kendoGrid").unbind('change');    
}
$(document).on("keyup", "#gridLeft .k-detail-row .toolbar .Searchs", function(){ 
var selecteditem =  $.trim($(this).val()).toUpperCase(); 
    var kgrid =   $(this).closest('.orders1').data("kendoGrid");//$(this).closest('.orders1').html("");
var dataSource = new kendo.data.DataSource({
  transport: {
    read: {
      url: out_bounddetail+LOC_ID+"/"+AGRSTA_ID+"/"+selecteditem+"",
      dataType: "jsonp", // "jsonp" is required for cross-domain requests; use "json" for same-domain requests
      
      cache: true
    }
    
  },
  schema: {
    data: "d"
  },
  pageSize: 20,
  serverPaging: true // enable serverPaging so take and skip are sent as request parameters
});
dataSource.fetch(function() {
//  console.log(dataSource.view().length); // displays "20"
});

    
	//$('#grid').data('kendoGrid').dataSource.Read({name:value})
	 // dataSource.read.url=out_bounddetail+LOC_ID+"/"+AGRSTA_ID+"/"+selecteditem+"";
   //console.log($(this).closest('.orders1').data('kendoGrid').dataSource.read.url);
  dataSource.read();
  // kgrid.refresh();
	//  $("#grid").getKendoGrid().dataSource.read(); 
	//  console.log(selecteditem);
});

$(document).on("keyup", "#gridLeft .k-detail-row .toolbar .Search", function(){ 
    var selecteditem =  $.trim($(this).val()).toUpperCase(); 
    var kgrid =   $(this).closest('.orders1').data("kendoGrid");//$(this).closest('.orders1').html("");
	 
	 
	 
	AGRSTA_ID=$(this).attr("AGRSTA_ID");
	  if(typeof AGRSTA_ID =='undefined')
	    return false;
		LOC_ID=$(this).attr("LOC_ID");
    selecteditem = selecteditem.toUpperCase(); //;console.log(selecteditem);
   
    if(selecteditem=="")
	   selecteditem="aends"; 
	   
	  $(this).closest('.orders1').data("kendoGrid").destroy(); 
	   var currentdate = new Date();
 var dataSource212 = new kendo.data.DataSource({
    transport: {
     			read: {async: true,
      					//url:  "<?=base_url()?>rtmi/rtmi_cando/get_rtmi_out_bound/"+LOC_ID+"/"+e.data.AGRSTA_ID+"",
						url: out_bounddetail+LOC_ID+"/"+AGRSTA_ID+"/"+selecteditem+"/"+getRandomInt(),
	  					dataType: "json"  , contentType: 'application/json; charset=utf-8',
						 complete: function(data,xhr,textStatus)
						 {
						    $("#gridLeft .orders1").find(".k-grid-content").css("height","141px");
							 
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
				serverPaging: true,pageSize: 5,
	schema: { data: "data", total: "total" }
	
   });
   
          //  e.preventDefault();
                                
	$(this).closest('.orders1').kendoGrid({
		dataBound: function() {
		 
			 $("#gridLeft .orders1 table tbody tr").each(function(index, element) {
			  //  detailRow.find(".orders1 .k-grid-toolbar .clear").attr("LOC_ID",detailRow.find(".orders1").find('td:eq(13)').html());
			   //   detailRow.find(".orders1 .k-grid-toolbar .Search").attr("LOC_ID",detailRow.find(".orders1").find('td:eq(13)').html());
               var REJECTED_FLAG =  $(this).find('td:eq(8)').html();
			   var PRE_INSPECTION_FLAG =  $(this).find('td:eq(9)').html();
			   var VOID_DATE =  $(this).find('td:eq(10)').html();
			   $(this).css("cursor","pointer"); 
			   if(REJECTED_FLAG == 'Y')
			   {
				   $(this).find('td:eq(3)').css("background","#E00000"); 
				}
				else if(PRE_INSPECTION_FLAG == 'Y')
			   {
				   $(this).find('td:eq(3)').css("background","#88F888"); 
				}
				else if(VOID_DATE != '')
			   {
				   $(this).find('td:eq(3)').css("background","#CECECE"); 
				}
            });
		
		 
		 },
		
    dataSource: dataSource212,
  columns: [    {hidden: true, field: "MASAGR_ID" },
                { hidden: true, field: "AGRSTA_ID" },
				 
                //  { command: { text: "Log", click: showDetails },width:40},
   
      	        {field: "UNIT_NUMBER", title: "UNIT #",width:60},
				{field: "RTMI_NUMBER", title: "RTMI #",width:100},
		    	 {field: "RTMI_TYPE",title:"RTMI TYPE",width:70}  ,
				 {field: "KANDO_RTMI_DATE", title: "RTMI DATE",width:80},
				 {field: "CUSTOMER_CODE", title: "CUSTOMER",width:80} ,
				 {field: "UNIT_PREFERRED_NUMBER", title: "PREFERRED #"},
				 { hidden: true, field: "REJECTED_FLAG" },
				{ hidden: true, field: "PRE_INSPECTION_FLAG" },
				{ hidden: true, field: "VOID_DATE" },
				 { hidden: true, field: "UNIT_BARCODE_NUMBER" },
				{ field: "KENDO_OUTBOUND_DATE",title: "OUTBOUND DATE"} ,  { hidden: true, field: "LOC_ID_OUTBOUND" }
				
     ],sort: {field: "KANDO_RTMI_DATE", dir: "asc"},
	 mobile: true,
     height: 240,
		resizable:true,
		scrollable: true,
		sortable: {
                    mode: "single",
                    allowUnsort: false
                },
		//filterable: true,
		//toolbar: kendo.template($("#Searchtemplate").html()), 
		 pageable: {
                    //refresh: true,
                    pageSize: 5,
					pageSizes:true,
					buttonCount:6,
					change: function(e) {
					//	e.preventDefault();
					//	return false;
       // console.log(e);
      }
					//change:onChangeSelection
                }
		

   });

    	
   
   /*
   
    var selectedArray = selecteditem.split(" ");
    if (selecteditem) {
        //kgrid.dataSource.filter({ field: "UserName", operator: "eq", value: selecteditem });
        var orfilter = { logic: "or", filters: [] };
        var andfilter = { logic: "and", filters: [] };
        $.each(selectedArray, function (i, v) {
            if (v.trim() == "") {
            }
            else {
                $.each(selectedArray, function (i, v1) {
                    if (v1.trim() == "") {
                    }
                    else {
                        orfilter.filters.push({ field: "UNIT_NUMBER", operator: "contains", value:v1 },
                                              { field: "RTMI_NUMBER", operator: "contains", value:v1},
											  { field: "RTMI_TYPE", operator: "contains", value:v1 },
											   { field: "CUSTOMER_CODE", operator: "contains", value:v1 },
                                              { field: "UNIT_PREFERRED_NUMBER", operator: "contains", value:v1}
											  );
                        andfilter.filters.push(orfilter);
                        orfilter = { logic: "or", filters: [] };
                    }
 
                });
            }
        });
        kgrid.dataSource.filter(andfilter);
    }
    else {
        kgrid.dataSource.filter({});
    }
 */
});
$(document).on("keyup", "#gridRight .k-detail-row .toolbar .Search", function(e){

	 var selecteditem =  $.trim($(this).val()).toUpperCase(); 
    var kgrid =   $(this).closest('.ordersright1').data("kendoGrid");//$(this).closest('.orders1').html("");
    selecteditem = selecteditem.toUpperCase(); //;console.log(selecteditem);
    AGRSTA_ID=$(this).attr("AGRSTA_ID");
    if(selecteditem=="")
	   selecteditem="aends";
   var currentdate = new Date();
    if(typeof AGRSTA_ID =='undefined')
	    return false;
		LOC_ID=$(this).attr("LOC_ID");
   $(this).closest('.ordersright1').data("kendoGrid").destroy();
 var dataSource212 = new kendo.data.DataSource({
    transport: {
     			read: {async: true,
      					//url:  "<?=base_url()?>rtmi/rtmi_cando/get_rtmi_out_bound/"+LOC_ID+"/"+e.data.AGRSTA_ID+"",
						url: get_tcmi_inbound+LOC_ID+"/"+AGRSTA_ID+"/"+selecteditem+"/"+getRandomInt(),
	  					dataType: "json" ,  contentType: 'application/json; charset=utf-8'
     				   }
	
    			},serverPaging: true,pageSize: 5,serverSorting: true,
	schema: { data: "data", total: "total" }
	
   });
  
                                       
	$(this).closest('.ordersright1').kendoGrid({
		dataBound: function() {
		  $("#gridRight .ordersright1 table tbody tr").each(function(index, element) {
			// $("#gridLeft .orders1 table tbody tr").each(function(index, element) {
               var REJECTED_FLAG =  $(this).find('td:eq(8)').html();
			   var PRE_INSPECTION_FLAG =  $(this).find('td:eq(9)').html();
			   var VOID_DATE =  $(this).find('td:eq(10)').html();
			   $(this).css("cursor","pointer"); 
			   if(REJECTED_FLAG == 'Y')
			   {
				   $(this).find('td:eq(3)').css("background","#E00000"); 
				}
				else if(PRE_INSPECTION_FLAG == 'Y' && AGRSTA_ID != '10')
			   {
				   $(this).find('td:eq(3)').css("background","#88F888"); 
				}
				else if(VOID_DATE != '')
			   {
				   $(this).find('td:eq(3)').css("background","#CECECE"); 
				}
            });
		
		 
		 },
		
    dataSource: dataSource212,
  columns: [    {hidden: true, field: "MASAGR_ID" },
                { hidden: true, field: "AGRSTA_ID" },
				//{ command: { text: "Log", click: showDetails },width:40},
   
      	        {field: "UNIT_NUMBER", title: "UNIT #",width:70},
				{field: "RTMI_NUMBER", title: "RTMI #",width:115},
		    	 {field: "RTMI_TYPE",title:"RTMI TYPE",width:90}  ,
				 {field: "KANDO_RTMI_DATE", title: "RTMI DATE",width:95},
				 {field: "CUSTOMER_CODE", title: "CUSTOMER",width:80} ,
				 {field: "UNIT_PREFERRED_NUMBER", title: "PREFERRED #"},
				 { hidden: true, field: "REJECTED_FLAG" },
				{ hidden: true, field: "PRE_INSPECTION_FLAG" },
				{ hidden: true, field: "VOID_DATE" },
				 { hidden: true, field: "UNIT_BARCODE_NUMBER" },
				{ field: "KENDO_INBOUND_DATE", title: "INBOUND DATE"} ,  { hidden: true, field: "LOC_ID_INBOUND" }
				
     ],sort: {field: "KENDO_INBOUND_DATE", dir: "asc"},
	 mobile: true,
     height: 240,
		resizable:true,
		scrollable: true,
		 
		sortable: {
                    mode: "single",
                    allowUnsort: false
                },
		//filterable: true,
		//toolbar: kendo.template($("#Searchtemplate").html()), 
		 pageable: {
                    //refresh: true,
                    pageSize: 6,
					pageSizes:true,
					buttonCount:3
                }
		

   });

	
});
$(document).on("dblclick", ".orders1 table tbody tr", function(e){
	
	$("#divLoading").show();
	var MASAGR_ID=$(this).find('td:eq(0)').html();
	var AGRSTA_ID=$(this).find('td:eq(1)').html();
	var RTMI_NUMBER =$(this).find('td:eq(3)').html();
	var url = "tcmi/updateTCMI/get_data_for_update/"+RTMI_NUMBER+"/"+MASAGR_ID+"/"+AGRSTA_ID+"";
	window.location.href = outboundupdate+url;
	
	});
 

               
function detailInitright(e) {
	 
var detailRow = e.detailRow;   LOC_ID=e.data.LOC_ID;
var currentdate = new Date();
 
 var dataSourceright1 = new kendo.data.DataSource({
    transport: {
     			read: {async: true,
      					url: inbound_statuses+e.data.LOC_ID+"/"+getRandomInt(),
	  					dataType: "json"  
     				   }
    			},
	schema: { data: "data", total: "total" }
   });
  
                                       
	detailRow.find(".ordersright").kendoGrid({
    dataSource: dataSourceright1,
  columns: [ {hidden: true, field: "COLOR_CODE" },{hidden: true, field: "AGRSTA_ID" }, {hidden: true, field: "LOC_ID" },
         {field: "STATUS", title: "STATUS"},
					{field: "COUNT", title: "COUNT",template:' <span class="badge badge-inverse pull-right"  style="float:right">#= COUNT #</span>'}
		  
     ],mobile: true,
    // height: 400,
		scrollable: false,
		sortable: false,
		filterable: false,
		 detailTemplate: kendo.template($("#templateright1").html()),
		 detailInit: detailInitright1,
		 detailExpand: function(e) {
            this.collapseRow(this.tbody.find(' > tr.k-master-row').not(e.masterRow));
        },
		 dataBound: function() {
			 $("#gridRight .ordersright table tbody tr").each(function(index, element) {
                $(this).find('td:first').css("background",$(this).find('td').eq(1).html());
            });
		 this.collapseRow(this.tbody.find("tr.k-master-row").first());
		 
		 }	

   });

}
  function detailInitright1(e) {
var detailRow = e.detailRow;   AGRSTA_ID=e.data.AGRSTA_ID;
//console.log(e.data.LOC_ID);//Loc_Id_Inbound
LOC_ID=e.data.LOC_ID;
var currentdate = new Date();
 var   selecteditem="aends";
 var dataSourceright2 = new kendo.data.DataSource({
    transport: {
     			read: {async: true,
      					url:  tcmi_inbounddetail+LOC_ID+"/"+e.data.AGRSTA_ID+"/"+selecteditem+"/"+getRandomInt(),
	  					dataType: "json"  ,
						
     contentType: 'application/json; charset=utf-8'
     				   }
					   ,
					   
					   
					    parameterMap: function (options) {
                        var object = {};
                        object.model = options.model;
                        object.page = options.page;
                        object.size = options.size;
                        object.skip = options.skip;
                        object.take = options.take;
                        object.sort = options.sort;
                        return options;
                    }
    			},serverPaging: true,pageSize: 5,serverSorting: true,
	schema: { data: "data", total: "total" }
	
   });
  
                                       
	detailRow.find(".ordersright1").kendoGrid({
		
		dataBound: function() {
		//console.log("goog");
			 $("#gridRight .ordersright1 table tbody tr").each(function(index, element) {
			    detailRow.find(".ordersright1 .k-grid-toolbar .Search").attr("AGRSTA_ID",detailRow.find(".ordersright1").find('td:eq(1)').html());
			    detailRow.find(".ordersright1 .k-grid-toolbar .clear").attr("AGRSTA_ID",detailRow.find(".ordersright1").find('td:eq(1)').html());
                detailRow.find(".ordersright1 .k-grid-toolbar .clear").attr("LOC_ID",detailRow.find(".ordersright1").find('td:eq(13)').html());
			    detailRow.find(".ordersright1 .k-grid-toolbar .Search").attr("LOC_ID",detailRow.find(".ordersright1").find('td:eq(13)').html());
			  
			   var REJECTED_FLAG =  $(this).find('td:eq(8)').html();
			   var PRE_INSPECTION_FLAG =  $(this).find('td:eq(9)').html();
			   var VOID_DATE =  $(this).find('td:eq(10)').html();
			   $(this).css("cursor","pointer"); 
			   if(REJECTED_FLAG == 'Y')
			   {
				   $(this).find('td:eq(3)').css("background","#E00000"); 
				}
				else if(PRE_INSPECTION_FLAG == 'Y' && AGRSTA_ID != '10')
			   {
				   $(this).find('td:eq(3)').css("background","#88F888"); 
				}
				else if(VOID_DATE != '')
			   {
				   $(this).find('td:eq(3)').css("background","#CECECE"); 
				}
            });
		
		 
		 },
		
    dataSource: dataSourceright2,
  columns: [	{hidden: true, field: "MASAGR_ID" },
                { hidden: true, field: "AGRSTA_ID" },
				//{ command: { text: "Log", click: showDetails },width:40},
   
				{field: "UNIT_NUMBER", title: "UNIT #",width:65},
      			{field: "RTMI_NUMBER", title: "RTMI #",width:105},
		        {field: "RTMI_TYPE",title:"RTMI TYPE",width:80}  ,
				//{field: "RTMI_DATE", title: "RTMI DATE",template:"#=kendo.toString(RTMI_DATE,'mm-d-yyyy')#"},
				{field: "KANDO_RTMI_DATE", title: "RTMI DATE",width:85},
				//format:"{0:MM-dd-yyyy}
				{field: "CUSTOMER_CODE", title: "CUSTOMER",width:80} ,
				{field: "UNIT_PREFERRED_NUMBER", title: "PREFERRED #"} ,
				{ hidden: true, field: "REJECTED_FLAG" },
				{ hidden: true, field: "PRE_INSPECTION_FLAG" },
				{ hidden: true, field: "VOID_DATE" },
				{ hidden: true, field: "UNIT_BARCODE_NUMBER" },
				{ field: "KENDO_INBOUND_DATE", title: "INBOUND DATE"} ,  { hidden: true, field: "LOC_ID_INBOUND" }
				
		
     ],sort: {field: "KANDO_RTMI_DATE", dir: "asc"},
	 mobile: true,
	 
	 
	  
	 //resize:true,
	 
    height: 240,
	  toolbar: kendo.template($("#Searchtemplate").html()), 
		resizable:true,
		scrollable: true,
		sortable: true,
		sortable: {
                    mode: "single",
                    allowUnsort: false
                },
		//filterable: true,
		 pageable: {
                   // refresh: true,
                    pageSize: 6,
					pageSizes:true,
					buttonCount:3
					
                }
		

   });

} 
 
Ext.onReady(function(){
		var searchData = new Ext.data.JsonStore({
		paramsAsHash: true,
		root: "fields",
		url: sencha,
		idProperty: "student_id",
		totalProperty: "totalCount",
		//paramOrder: ["start", "limit", "query", "cus_id"],
		fields: ["first_name","last_name","course","section"]
		});
				
		var pref = new Ext.form.ComboBox({
			store: searchData,
			displayField: "first_name",
			valueField: "student_id",
			typeAhead: false,
			name: "first_name",
			fieldLabel: "Studnet ID #",
			loadingText: "Searching...",
			allowSearchMinChars: 3,
			selectOnFocus: false,
			forceSelection: false,
			validateOnBlur: false,
			anchor: "100%",
			pageSize: 7,
			minChars: 3,
			width:260,
			itemSelector: "div.search-item",
			hideTrigger: true,
			
		   tpl: new Ext.XTemplate('<tpl for="."><div class="search-item">',  "<B>Name #: </B>{first_name} {last_name} <B> Course # : </B> {course}<br/>", "<B>section : </B>{section}<br/></tpl>"),
			applyTo: 'gSearch', //input field ID 
			onSelect: function(fields){ 
			// override default onSelect to do redirect
					// if(fields.data.UNIT_PREFERRED_NUMBER == 'null' || fields.data.UNIT_PREFERRED_NUMBER == null)
					// 	$("#gSearch").val(fields.data.RTMI_NUMBER);
					// else
					// 	$("#gSearch").val(fields.data.UNIT_PREFERRED_NUMBER);
					// $("#rtmi_number").val(fields.data.RTMI_NUMBER);
					// $("#masagr_id").val(fields.data.MASAGR_ID);
					// $("#agrsta_id").val(fields.data.AGRSTA_ID);
					// update_rtmi();
					// this.collapse();
				}
		});
	
	widths();
	});
	
	function  update_rtmi()
		{
			
			var RTMI_NUMBER = $('#rtmi_number').val();
			var MASAGR_ID   = $('#masagr_id').val();
			var AGRSTA_ID   = $('#agrsta_id').val();
			
			if(RTMI_NUMBER =='' || MASAGR_ID=='' || AGRSTA_ID =='')
			{
				return false;
			}
			else
			{
				$("#divLoading").show();
				var url = "tcmi/updateTCMI/get_data_for_update/"+RTMI_NUMBER+"/"+MASAGR_ID+"/"+AGRSTA_ID+"";
				window.location.href = intboundupdate+url;
			}
		}
 
$(document).on("dblclick", ".ordersright1 table tbody tr", function(){
	$("#divLoading").show();
	var MASAGR_ID=$(this).find('td:eq(0)').html();
	var AGRSTA_ID=$(this).find('td:eq(1)').html();
	var RTMI_NUMBER =$(this).find('td:eq(3)').html();

	var url = "tcmi/updateTCMI/get_data_for_update/"+RTMI_NUMBER+"/"+MASAGR_ID+"/"+AGRSTA_ID+"";
	window.location.href = intboundupdate+url;

	});
 
$(document).delegate('#gridLeft .k-master-row', 'click', function() {
  
  var grid = $(".orders").data("kendoGrid");
  
  if ($(this).find(".k-icon").hasClass("k-minus")) {
    grid.collapseRow(this);
  } else {
    grid.expandRow(this);
  }
  
});
$(document).delegate('#gridRight .k-master-row', 'click', function() {
 
  
  var grid = $(".ordersright").data("kendoGrid");
  
  if ($(this).find(".k-icon").hasClass("k-minus")) {
    grid.collapseRow(this);
  } else {
    grid.expandRow(this);
  }
  
});



 
	 
$(document).delegate('#gridLeft .orders1 table tbody tr', 'mouseover', function() {
	var out_bound_date = $(this).find('td:eq(12)').html();
	if(out_bound_date == '')
	{
		out_bound_date = 'N/A ';
	}
	 
	// alert($(this).find('td:eq(1)').html());
 $(this).addClass('masterTooltip');
 var content = "<table style=width:300px>"
 
    content += '<tr><td>UNIT NUMBER</td><td>' + ':' +  $(this).find('td:eq(2)').html() + '</td>';
	content += '<tr><td>RTMI NUMBER</td><td>' + ':' +  $(this).find('td:eq(3)').html() + '</td>';
	  content += '<tr><td>RTMI TYPE </td><td> ' + ':' + $(this).find('td:eq(4)').html() + '</td></tr>';
	    content += '<tr><td>PREFERRED #</td><td>' + ':' +  $(this).find('td:eq(7)').html() + '</td></tr>';
		 content += '<tr><td>RTMI DATE</td><td>' + ':' +  $(this).find('td:eq(5)').html() + '</td></tr>';
		 		 content += '<tr><td>CUSTOMER</td><td>' + ':' +  $(this).find('td:eq(6)').html() + '</td></tr>'; 
				 content += '<tr><td>BARCODE</td><td>' + ':' +  $(this).find('td:eq(11)').html() + '</td></tr>'; 
				 content += '<tr><td>OUTBOUND DATE</td><td>' + ':' +  out_bound_date + '</td></tr>';
   content += "</table>"
      
        $(this).data('tipText', content).removeAttr('content');
        $('<p class="tooltip"></p>').append(content) 
        .appendTo('body')
        .fadeIn('slow');
} );$(document).delegate('.masterTooltip', 'mouseout', function(e) {
  
	  $(this).attr('content', $(this).data('tipText'));
        $('.tooltip').remove();
});$(document).delegate('.masterTooltip', 'mousemove', function(e) {

        var mousex = e.pageX + 20; //Get X coordinates
        var mousey = e.pageY + 10; //Get Y coordinates
        $('.tooltip')
        .css({ top: mousey, left: mousex });
} );
 
//////////////////////////////////INBOUND TOOLTIP////////////////////////////////////

$(document).delegate('#gridRight .ordersright1 table tbody tr', 'mouseover', function() {
	
 $(this).addClass('masterTooltip');
 var content = "<table style=width:300px>"
 
    content += '<tr><td>UNIT NUMBER</td><td>' + ':' +  $(this).find('td:eq(2)').html() + '</td>';
    content += '<tr><td>RTMI NUMBER</td><td>' + ':' +  $(this).find('td:eq(3)').html() + '</td>';
	  content += '<tr><td>RTMI TYPE </td><td> ' + ':' + $(this).find('td:eq(4)').html() + '</td></tr>';
	    content += '<tr><td>PREFERRED #</td><td>' + ':' +  $(this).find('td:eq(7)').html() + '</td></tr>';
		 content += '<tr><td>RTMI DATE</td><td>' + ':' +  $(this).find('td:eq(5)').html() + '</td></tr>';
		 		 content += '<tr><td>CUSTOMER</td><td>' + ':' +  $(this).find('td:eq(6)').html() + '</td></tr>'; 
				 content += '<tr><td>BARCODE</td><td>' + ':' +  $(this).find('td:eq(11)').html() + '</td></tr>'; 
				 content += '<tr><td>INBOUND DATE</td><td>' + ':' +  $(this).find('td:eq(12)').html() + '</td></tr>';
   content += "</table>"
      
        $(this).data('tipText', content).removeAttr('content');
        $('<p class="tooltip"></p>').append(content) 
        .appendTo('body')
        .fadeIn('slow');
} );$(document).delegate('.masterTooltip', 'mouseout', function(e) {

	  $(this).attr('content', $(this).data('tipText'));
        $('.tooltip').remove();
});$(document).delegate('.masterTooltip', 'mousemove', function(e) {

        var mousex = e.pageX + 20; //Get X coordinates
        var mousey = e.pageY + 10; //Get Y coordinates
        $('.tooltip')
        .css({ top: mousey, left: mousex });
} );
 
$(".loader").click(function(){
	//$("#divLoading").show()
});


 function showDetails(e) {
 var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
 
	var MASAGR_ID=dataItem.MASAGR_ID;//$(this).find('td:eq(1)').html();
	
	 $.ajax(
			{async:true,
			 type: "post",
        dataType: "html",
		data:{'MASAGR_ID':MASAGR_ID},
		url:audit_log,
		 success: function(data)
			  { 
			   var  wnd = $("#details")
                        .kendoWindow({
                            title: "View Audit Log",
                            modal: true,
                            visible: false,
                            resizable: true,
                            
    height: 400, open: function (e) {
        $("body").addClass("ob-no-scroll");
    },
    close: function(e) {
        $("body").removeClass("ob-no-scroll");
    }
                        }).data("kendoWindow");
			   wnd.content(data);
               wnd.center().open();
  
		},  
		error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(XMLHttpRequest,"  textStatus: "+textStatus ," errorThrown:"+errorThrown);
         }
		}); 
  }
window.setInterval(function() 
{
	$.ajax({
        type:'POST',
        url: loginlogout,
        success: function(data)
        {
			if(data != 'login')
				location.href=base_url;
		}
	 });
    
},5000);
function widths(){
	$('#rtmi_search').prop('style',"width:262px;");
}
$(window).on('beforeunload',function() {
	
    $("#divLoading").show();
});

$(window).on('unload',function() {
	
    $("#divLoading").hide();
});
 