<!DOCTYPE html>
<html>
<head>
<title>
</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
.container{
    height: 200px;
    width: 400px;
    border:1px solid blue;
    margin: 0 auto;
}
</style>
<script>



$(document).ready(function(){
    $(document).on('click','.filereader',function(){
        let file=document.getElementById('file');
        addData(file);
    
    });
    

})

</script>
</head>
<body>
<div>
<video id="videoplayer_html5_api" class="vjs-tech" tabindex="-1" role="application" preload="auto" autoplay="" src="blob:https://www.dubox.com/49a7c510-1470-4508-80b2-842604716891" __idm_id__="331998209"></video>
</div>
<div class ="container">
    <input type="file" id="file">
    <button class="filereader">ADD</button>
    <input type="button" value="Download JSON" onclick="DownloadJSON()" />
</div>
</body>
<script>
    function addData(input) {
        let file = input.files[0];
        let reader = new FileReader();

          reader.readAsText(file);

          reader.onload = function() {
            console.log(reader.result);
            let data= JSON.parse(reader.result);

            localStorage.setItem('data', JSON.stringify(data));
          };

          reader.onerror = function() {
            console.log(reader.error);
          };

    }


    function DownloadJSON() {
        var data = localStorage.getItem('data');
        //Convert JSON Array to string.
        var json = data;
 
        //Convert JSON string to BLOB.
        json = [json];
        var blob1 = new Blob(json, { type: "text/plain;charset=utf-8" });
 
        //Check the Browser.
        var isIE = false || !!document.documentMode;
        if (isIE) {
            window.navigator.msSaveBlob(blob1, "Customers.txt");
        } else {
            var url = window.URL || window.webkitURL;
            link = url.createObjectURL(blob1);
            var a = document.createElement("a");
            a.download = "backup.json";
            a.href = link;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        }
    }
</script>
</html>