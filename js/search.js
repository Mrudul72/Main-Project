//search for page name
$("#searchInput").on("keyup", function () {
  $("#searchResult").html("");
  if ($("#searchInput").val().length > 0) {
    var value = $(this).val().toLowerCase() + "%";

    if ($("#searchInput").val() == "") {
      $("#searchResults").html("");
    }
    $("#searchResult").show();
    $.ajax({
      url: "./server/search.php",
      type: "POST",
      data: {
        search: value,
      },
      success: function (data) {
        $("#searchResult").html(data);
      },
    });
  }else{
    $("#searchResult").hide();
  }
});

$(document).mouseup(function (e) {
  var container = $("#searchResult");

  // if the target of the click isn't the container nor a descendant of the container
  if (!container.is(e.target) && container.has(e.target).length === 0) {
    container.hide();
    $("#searchInput").val("");
  }
});
