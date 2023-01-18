let informacion=document.querySelector('#infoPersona')

fetch(`/cargoJson.php`)
.then(response=>response.json())
.then(data=>{
    console.log(data)
    for(const c of data){
        informacion.innerHTML=`<p>${c.cargo}</p><p>${c.usuario}</p>`
    }
    
})
.catch(error=>console.error('1 error:', error))