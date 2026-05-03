$(document).ready(function () {

  $("#fondoModal").hide();

  $("#fondoModal").css({
    position: "fixed",
    top: 0,
    left: 0,
    width: "100%",
    height: "100%",
    background: "rgba(0,0,0,0.6)",
    display: "flex",
    justifyContent: "center",
    alignItems: "center"
  });

  $("#modal").css({
    background: "#fff",
    padding: "20px",
    width: "300px",
    borderRadius: "10px",
    textAlign: "center"
  });

  $("#fondoModal").fadeIn(200);

  $("#fondoModal").on("click", function (e) {
    if (e.target.id === "fondoModal") {
      $(this).fadeOut(200);
    }
  });

});
