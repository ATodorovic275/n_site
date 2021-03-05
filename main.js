$(document).ready(function () {
  var carts = $(".cart");
  //   console.log(carts[0]);

  carts.click(function (e) {
    e.preventDefault();

    let id = $(this).data("id");

    console.log(id);

    $.ajax({
      type: "post",
      url: "session.php",
      data: {
        id: id,
      },
      dataType: "json",
      success: function (data, text, xhr) {
        console.log(xhr);
        console.log(data);
      },
      error: function (xhr, status, err) {
        console.log(xhr);
      },
    });
  });
});
