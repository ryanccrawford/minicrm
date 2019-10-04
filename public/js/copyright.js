function copyRight(elementId) {
    var today = new Date();
    var cy = today.getFullYear();
    document.getElementById(elementId).innerText = cy;
}

$(document).ready(function() {
    copyRight('copyyear');
})