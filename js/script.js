var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol');

tombolCari.addEventListener('click', function () {


        //buat object ajax
        var xhr = new XMLHttpRequest();
        //cek kesiapan
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
            }
        }

        //eksekusi ajax
        xhr.open('GET', 'ajax/cari.php', true);
        xhr.send();




    }

);