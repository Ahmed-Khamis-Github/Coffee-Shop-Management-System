import './bootstrap';
import swal from 'sweetalert';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


var channel = Echo.private(`App.Models.User.${userID}`);
channel.notification(function(data) {
    

  swal({
    title: data.subject,
     icon: "success",
  });

 });