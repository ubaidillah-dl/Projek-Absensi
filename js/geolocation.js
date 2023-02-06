function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, showError);
  }
}

function showPosition(position) {
  document.querySelector('.myform input[name = "latitude"]').value = position.coords.latitude;
  document.querySelector('.myform input[name = "longitude"]').value = position.coords.longitude;
}

function showError(error) {
  switch (error.code) {
    case error.PERMISSION_DENIED:
      alert("Hidupkan lokasi untuk mendeteksi lokasi anda !");
      location.reload();
      break;

    default:
      break;
  }
}
