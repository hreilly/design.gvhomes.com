$ = jQuery;
  
var pfs = $("#plan-filter-search"); 
var pfsForm = pfs.find("form");

$('input[type=radio]').on('change', function() {
    $(this).closest("form").submit();
});
  
pfsForm.submit(function(e){
    e.preventDefault(); 
  
    console.log("form submitted");
  
    var product = $("input[name='product']:checked").val();
      
    var data = {
        action : "plan_filter_search",
        product : product,
    }

    $.ajax({
        url : ajax_url,
        data : data,
        success : function(response) {
            pfs.find("#plan_filter_search_results").empty();
            if(response) {
                for(var i = 0 ;  i < response.length ; i++) {
                     var html  = "<a href='" + response[i].permalink + "' title='" + response[i].title + "'>";
                         html += "    <div class='movie-info'>";
                         html += "        <h4>" + response[i].title + "</h4>";
                         html += "    </div>";
                         html += "</a>";
                     pfs.find("#plan_filter_search_results").append(html);
                }
            } else {
                var html  = "<li class='no-result'>No matching movies found. Try a different filter or search keyword</li>";
                pfs.find("#plan_filter_search_results").append(html);
            }
        } 
    });

});