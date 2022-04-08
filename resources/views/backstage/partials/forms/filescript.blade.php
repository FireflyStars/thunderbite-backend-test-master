

<script>
    console.log('test')
    let customfiles = document.getElementsByClassName('custom-file-input');
    for (let i = 0; i < customfiles.length; i++) {
        customfiles[i].addEventListener('change', changeInputName, false)
    }

    function changeInputName(e){
        var fileName = e.target.files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    }

</script>

