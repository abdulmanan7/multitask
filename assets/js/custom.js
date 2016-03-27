   function showMessage(msg,type,title) {
            if (title==undefined) {
              title="Notification";
            };
            if (title==undefined) {
              type="dark";
            };
            new PNotify({
                title: title,
                type: type,
                text:msg,
                nonblock: {
                    nonblock: true
                },
                before_close: function (PNotify) {
                    // You can access the notice's options with this. It is read only.
                    //PNotify.options.text;

                    // You can change the notice's options after the timer like this:
                    PNotify.update({
                        title: PNotify.options.title + " - Enjoy your Stay",
                        before_close: null
                    });
                    PNotify.queueRemove();
                    return false;
                }
            });
      }
function clear_message () {
  $('#message').html('');
  $('#message').empty();
}
$(document).ready(function() {
    // put all that "wl_alert" code here   
    $('body').on('click', '.system', function(e) {
      e.preventDefault();
      showMessage("Sorry ! This is a System value , That cannot be edit and delete",'error');
      return false;
    });
    $('body').on('click', '.del,.delete', function(event) {
      var row=$(this).parents('tr');
      var loc = $(this).attr('href');
      alertify.confirm("Are you sure you want to delete?", function (e) {
        if (e) {
            $.ajax({
              url:loc,
              success: function(data){
                var result=$.parseJSON(data);
                if (result.status>0) {
                  row.remove();
                  showMessage("Record successfully removed",'success','Info');
                }else{
                  showMessage("Error Occur while removeing record",'error','Info');
                };
              }
            });
            // document.location.href = loc;
          } else {
            showMessage("You've just Cancel Delete request!",'error','Cancel');
            return false;
          }
        });
      return false;
    });

});//ready end
$(function(){
  $('.datepicker').datepicker({ dateFormat: 'yy-mm-dd' }).on('changeDate', function(e){
    $(this).datepicker('hide');
  });
});
var Calculator = {

  results_id:    'calculator-result',
  results_value: '0',
  memory_id:     'calculator-screen',
  memory_value:  '',
  history_id:    'calc-history-list',
  history_value: [],

  SUM:  ' + ',
  MIN:  ' - ',
  DIV:  ' / ',
  MULT: ' * ',
  PROC: '%',
  SIN:  'sin(',
    COS:  'cos(',
      MOD:  ' mod ',
      BRO:  '(',
        BRC:  ')',

calculate: function() {
  this.history_value.push(this.memory_value);
  this.results_value = this.engine.exec(this.memory_value);
  this.add_to_history();
  this.refresh();
},

put: function(value) {
  this.memory_value += value;
  this.update_memory();
},

reset: function() {
  this.memory_value = '';
  this.results_value = '0';
  this.clear_history();
  this.refresh();
},

refresh: function() {
  this.update_result();
  this.update_memory();
},

update_result: function() {
  document.getElementById(this.results_id).innerHTML = this.results_value;
},

update_memory: function() {
  document.getElementById(this.memory_id).innerHTML = this.memory_value;
},

add_to_history: function() {
  if (isNaN(this.results_value) == false) {
    var div = document.createElement('li');
    div.innerHTML = this.memory_value + ' = ' + this.results_value;

    var tag = document.getElementById(this.history_id);
    tag.insertBefore(div, tag.firstChild);
  }
},

clear_history: function(){
  $('#'+this.history_id+ '> li').remove();
},

engine: {
  exec: function(value) {
    try {return eval(this.parse(value))}
    catch (e) {return e}
  },

  parse: function(value) {
    if (value != null && value != '') {
      value = this.replaceFun(value, Calculator.PROC, '/100');
      value = this.replaceFun(value, Calculator.MOD, '%');
      value = this.addSequence(value, Calculator.PROC);

      value = this.replaceFun(value, 'sin', 'Math.sin');
      value = this.replaceFun(value, 'cos', 'Math.cos');
      return value;
    }
    else return '0';
  },

  replaceFun: function(txt, reg, fun) {
    return txt.replace(new RegExp(reg, 'g'), fun);
  },

  addSequence: function(txt, fun) {
    var list = txt.split(fun);
    var line = '';

    for(var nr in list) {
      if (line != '') {
        line = '(' + line + ')' + fun + '(' + list[nr] + ')';
      } else {
        line = list[nr];
      }
    }
    return line;
  }
}
}
$(document).keypress(function(e) {/*
  var element = $('*[data-key="'+e.which+'"]');

  var fun = function(element){
    // skip if this is no a functional button
    if (element.length == 0){ return true }

    if (element.data('constant') != undefined){
      return Calculator.put(Calculator[element.data('constant')]);
    }

    if (element.data('method') != undefined){
      return Calculator[element.data('method')]();
    }

    return Calculator.put(element.html());
  }

  if (fun(element) != false){
    return false
  } else {
    return true
  }
*/});
$(document).ready(function() {

  $(".btn_cal").click(function(e) {
    e.preventDefault();

    if ($(this).data('constant') != undefined){
      return Calculator.put(Calculator[$(this).data('constant')]);
    }

    if ($(this).data('method') != undefined){
      return Calculator[$(this).data('method')]();
    }

    return Calculator.put($(this).html());
  });
});
// var delete={
//   config:{
//       status:1,
//       message:"Record has been successfully removed!"
//   },
//   init:function(config) {
//     $.extend(this.config, config);
//     if (delete.config.status>0) {
//         alertify.success(delete.message);
//         alert(delete.message);
//     }else{
//         alertify.error(delete.message);
//     }
//   },
//   // complete:function(){

//   // }
// }
function remove_row() {
  $(this).parents('tr').remove();
}
$('body').on('click', '.rem', function(event) {
  event.preventDefault();
  // feeTransaction.removeRow.call(this);
  remove_row.call(this);
});
$('body').on('click', '.show-block', function(event) {
  event.preventDefault();
  var body = $('.hide-block').slideToggle(500);
    // var body = $(this).parents('.widget').find('.hide-block').slideToggle(500);
  });


//tooltips
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
//genral search
$('body').on('change', '.search-query', function(event) {
  event.preventDefault();
    $.ajax({
    url: base_url+"ajax/search",
    dataType: 'html',
    type:'POST',
    data:{
      controller:module,
      method:method,
      term:$('.search-query').val(),
    },
    success:function(msg){
      $("#message_box").remove();
      $(".dashboard-wrapper").html(msg);
},
})
    .done(function() {
  // alertify.success("");
  showMessage('Search processing ,Completed!','success','Genral Search');
})
.fail(function() {
  // alertify.error("Error !Record cannot be retrived! try advance search!");
  showMessage('Error !Record cannot be retrived! try advance search!',"error",'Genral Search');
})
});
//kendo
// Kendo UI theme for data visualization widgets
// Use as theme: 'newTheme' in configuration options (or change the name)
kendo.dataviz.ui.registerTheme('newTheme', {
    "chart": {
        "title": {
            "color": "#333333"
        },
        "legend": {
            "labels": {
                "color": "#333333"
            }
        },
        "chartArea": {
            "background": "#ffffff"
        },
        "seriesDefaults": {
            "labels": {
                "color": "#333333"
            }
        },
        "axisDefaults": {
            "line": {
                "color": "#cccccc"
            },
            "labels": {
                "color": "#333333"
            },
            "minorGridLines": {
                "color": "#ebebeb"
            },
            "majorGridLines": {
                "color": "#cccccc"
            },
            "title": {
                "color": "#333333"
            }
        },
        "seriesColors": [
            "#428bca",
            "#5bc0de",
            "#5cb85c",
            "#f2b661",
            "#e67d4a",
            "#da3b36"
        ]
    },
    "gauge": {
        "pointer": {
            "color": "#428bca"
        },
        "scale": {
            "rangePlaceholderColor": "#cccccc",
            "labels": {
                "color": "#333333"
            },
            "minorTicks": {
                "color": "#ebebeb"
            },
            "majorTicks": {
                "color": "#cccccc"
            },
            "line": {
                "color": "#cccccc"
            }
        }
    }
});

//end genral search

 $(document).ajaxStart(function() {
   $('#ajaxLoader').show();
 }).ajaxComplete(function() {
   $('#ajaxLoader').hide();
 }).ajaxStop(function() {
   $('#ajaxLoader').hide();
 });
 $(document).on('keydown', '.number', function(e) {
   if ($.inArray(e.keyCode, [46,8,9,27,13,110,190])!==-1 || (e.keyCode == 65 && (e.ctrlKey===true || e.metaKey === true )) || (e.keyCode >= 35 && e.keyCoke <= 40 )) {
    return;
   }
   if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57 )) && (e.keyCode < 96 || e.keyCode > 105 )) {
     e.preventDefault();
   }
 });