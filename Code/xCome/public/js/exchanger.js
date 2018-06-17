

function getCurrencyUsingJQuery() {
    var currVal = $("#CURR_VAL");
    currVal.val("");

    var currFrSelect = $("#CURR_FR");
    var fr = currFrSelect.val();

    var currToSelect = $("#CURR_TO");
    var to = currToSelect.val();


    var currId = fr + "_" + to;
    var protocol = window.location.protocol.replace(/:/g,'');

    currVal.attr("placeholder", "Converting...");
    $.getJSON(protocol + "://free.currencyconverterapi.com/api/v5/convert?q=" + currId + "&compact=y&callback=?",
        function(data){
            try {
                var currFrVal = parseFloat(document.getElementById("CURR_FR_VAL").value);
                currVal.val(numeral(currFrVal * data[currId].val).format("0,0.00[0]"));

            } catch (e) {
                alert("Please enter a number in the Amount field.");
            }

            currVal.attr("placeholder", "Press Convert button");

        });

}