 /* $("#toPdf").click(function(e) {
     $("#pdf_form").attr("method", "POST");
     $("#pdf_form").attr("action", "views/loan/pdf.php");
     $("#pdf_form").first().trigger("submit");

 }); */

 function viewTicketInfo(paid_id) {
     overlay("block")
     $(".ticketInfo").addClass("showTicketInfo");
     $(".ticketData").load(`views/loan/ticket.dataLoader.php?paid_id=${paid_id}`);

 }

 function overLayHide(element, eclass) {
     overlay("none");
     $(`${element}`).removeClass(eclass);
 }

 $(".overlay").click(() => {

     overLayHide(".ticketInfo", "showTicketInfo")
 });

 $(".ticketInfo span").click(() => {
     overLayHide(".ticketInfo", "showTicketInfo")
 });