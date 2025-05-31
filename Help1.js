//   for(let i = 1; i<=number; i++)
//   {
//   const tag = document.createElement("div");
//    tag.classList.add("umi"); 
//   const target = document.querySelector(".temp4");
//   target.appendChild(tag);
//   const text = document.createTextNode("Vaccine Name :"+name1);
//   const text1 = document.createTextNode("Vaccine Dose :"+name2);
//   const text2 = document.createTextNode("Vaccine Date :"+name3);
//   const text3 = document.createTextNode("Row Number :"+rowid);
//   const br1 = document.createElement("br");
//   const br2 = document.createElement("br");
//   const br3 = document.createElement("br");
//   tag.appendChild(text);
//   tag.appendChild(br1);
//   tag.appendChild(text1);
//   tag.appendChild(br2);
//   tag.appendChild(text2);
//   tag.appendChild(br3);
//   tag.appendChild(text3);
//   const btn = document.createElement("button");
//   btn.classList.add("deletebtn","buttonn");
//   btn.innerText = "DELETE";
//   tag.appendChild(btn);

  
//   btn.addEventListener("click",function()
//   {
//     var d = new Date();
//     d.setTime(d.getTime()+(15*1000));
//     var expiryString = d.toUTCString();
//     document.cookie = "Id="+rowid+";expires="+expiryString;
//     window.location.replace(window.location.href);
//     tag.remove();
    
//   })
//   }
// var xhttp = new XMLHttpRequest();
// xhttp.open("POST","third.php",true);
// xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
// xhttp.send("value="+rowid);
