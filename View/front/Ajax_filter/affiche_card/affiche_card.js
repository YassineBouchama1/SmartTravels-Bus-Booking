



function getData(tableName) {
    var result;
    let myRequest = new XMLHttpRequest();
    myRequest.open("GET", "View/front/Ajax_filter/affiche_card/ajaxData.php?table=" + tableName, false);
    myRequest.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            result = JSON.parse(this.responseText);
            console.log(result)

        }
    }
    myRequest.send();
   return result;
}

        let selectedValues = [];

        var xhr = new XMLHttpRequest();
        xhr.open('GET', "View/front/Ajax_filter/affiche_card/affiche_Compny.php", true);
        
        xhr.onload = function() {
          if (xhr.status >= 200 && xhr.status < 300) {
          const data = JSON.parse(xhr.responseText);
          

            // console.log( data)
         
            const tableElement = document.getElementById("data_Catégories");
        
        // Create an HTML string to store the checkbox list
        let htmlString = '';
        
        // Iterate through the data array and build the HTML string
        data.data.forEach(element => {

        htmlString += `
   
  <input value="${element["id"]}" type="checkbox" class="btn-check min" id="btncheck${element["id"]}" autocomplete="off">
  <label class="btn btn-outline-primary" for="btncheck${element["id"]}">${element["name"]}</label>
        
        `;
        
        
        });
        
        tableElement.innerHTML = htmlString;
        
        const checkboxes = document.querySelectorAll('.min');
        
        checkboxes.forEach(checkbox => {
          checkbox.addEventListener('change', function() {
              selectedValues = Array.from(document.querySelectorAll('.min:checked')).map(cb => cb.value);
         console.log(selectedValues);
              if (selectedValues.length > 0 ) {
                selectedValues =  getData(selectedValues);
              

              } 
              fetchData(0,280,"All");
          });
        });
        
          } else {
            console.error('Request failed with status ' + xhr.status);
          }
        };
        
        xhr.onerror = function() {
          console.error('Request failed');
        };
        
        xhr.send();
        
        
        
        let filteredProducts = []; 

const limit = 3;

function paginateFun(number_page) {
  const tableElement = document.getElementById("data");

  function date(mysqlTime) {
var timeComponents = mysqlTime.split(':');
var hours = timeComponents[0];
var minutes = timeComponents[1];
var formattedTime = new Date();
formattedTime.setHours(hours);
formattedTime.setMinutes(minutes);
var displayTime = formattedTime.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: false });
return displayTime ;
  }

  tableElement.innerHTML = "";

  const start = (number_page - 1) * limit;
  const end = number_page * limit;

  let    Company_id ;
// console.log( filteredProducts.Bus) ;
let AllData;

if (Array.isArray(filteredProducts.data) && filteredProducts.data.length > 0) {
    AllData = filteredProducts.data;
} else if (Array.isArray(filteredProducts) && filteredProducts.length > 0) {
    AllData = filteredProducts;
} else {
    // Handle the case when neither condition is met
    AllData = []; // or null or any other default value you prefer
}


  const paginate_items = AllData.slice(start, end).map((elem) => {
console.log(AllData)
   let Heure_arrivee = date(elem.Heure_arrivee) ;
   let  Heure_depart = date(elem.Heure_depart) ;
    return `     <div class="card mb-3">
    <div class="card-header">${elem.name}
    </div>
    
    <div class="card-body row align-items-center ">
      <div class="col-sm-3">
      <img src="${elem.img}" alt="" width="150px" height="160px">

      </div>
     <div class="col-sm-6 row align-items-center text-center ">

      <div style="font-size: 20px;" class="col-sm-4 ">${Heure_depart} <br>
      <label for="datepicker" class="form-label">${elem.Ville_depart}</label>
    </div>
      <div class="col-sm-4    ">
        <i style="font-size: 70px;" class="fas fa-long-arrow-alt-right"></i>
        </div>
      <div style="font-size: 20px;" class="col-sm-4 ">${Heure_arrivee}<br>
      <label for="datepicker" class="form-label">${elem.Ville_destination}</label>

    </div>
     </div>
     <div class="row  col-sm-3">

     <div style="font-size: 20px;" class="col-sm-12 ">${elem.price} MAD
     <h5 style="font-size: 10px;">par personne</h5>
    </div>
    <a href="index.php?action=buycard&id_card=${elem.ID}" class="btn btn-primary col-sm-12 mt-4 text-center">Go somewhere</a>
     </div>
    </div>
  </div>`;
  });

  tableElement.innerHTML = paginate_items.join("");
  if (AllData.length == 0 ) {
    tableElement.innerHTML = `
    <div class="  d-flex justify-content-end align-items-center">
    <div class="text-center">
        <div style="width: 60%; margin:"auto;" >
            <img src="https://ae01.alicdn.com/kf/S08ffda4d4a674d19a6217edf2cf66973l/Bad-Notice-Chest-Bags-Women-Error-404-File-Not-Found-Travel-Shoulder-Bag-Casual-Print-Small.jpg_960x960.jpg" width="520px" height="300px" alt="" class="img-fluid">
        </div>
        <div class="mt-5" style="width: 60%; margin:"auto;"">
            <p class="fs-3"><span class="text-danger">Oops!</span> Aucun voyage trouvé.</p>
          
            <a href="index.php" class="btn btn-primary">Go Home</a>
        </div>
    </div>
</div>

    ` ; 
  }

  const buttons = [...Array(Math.ceil(AllData.length / limit)).keys()].map((elem) => {
    return `<li class="page-item">
      <button class="page-link" data-page="${elem + 1}" onclick="paginateFun(${elem + 1})">${elem + 1}</button>
    </li>`;
  });

  document.getElementById("paginate").innerHTML = buttons.join("");

  const buttone = document.querySelectorAll('.page-link');
  buttone.forEach(button => {
    button.classList.remove('active');
  });

  const activeButton = document.querySelector(`.page-link[data-page="${number_page}"]`);
  if (activeButton) {
    activeButton.classList.add('active');
  }
}

function fetchData(minValue = 0 , maxValue = 0 , days) {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', "View/front/Ajax_filter/affiche_card/affiche_card.php?minValue=" + minValue +  "&maxValue=" + maxValue + "&days=" + days, true);

  xhr.onload = function () {
    if (xhr.status >= 200 && xhr.status < 300) {


      const data = JSON.parse(xhr.responseText);
    //   const data = xhr.responseText;
        // console.log(xhr.responseText)
      // Update filteredProducts with fetched data
    filteredProducts = data;
  //  console.log(filteredProducts) ;

      if (selectedValues.length > 0) {
        const selectedValuesIds = selectedValues.map(id => parseInt(id));

        // console.log(selectedValuesIds)
        // console.log(filteredProducts.data)
        
        filteredProducts = filteredProducts.data.filter(data => {
        return selectedValuesIds.includes(data.ID_Bus);
        });
       console.log(filteredProducts)
        }

    paginateFun(1); // Call paginateFun after fetching data
    } else {
      console.error('Request failed with status ' + xhr.status);
    }
  };

  xhr.onerror = function () {
    console.error('Request failed');
  };

  xhr.send();
}

fetchData(0,280 , "All");



  

  document.addEventListener('DOMContentLoaded', function () {
    // Initialize the range slider
    var myRangeSlider = new Slider('#myRange', {
      tooltip: 'always',
      min: 0,
      max: 280,
      step: 1,
      value: [50, 280]
    });


    function updateSelectedRange() {
      var values = myRangeSlider.getValue();

      var minValue = values[0];
      var maxValue = values[1];

      // console.log('Min Value:', minValue);
      // console.log('Max Value:', maxValue);
       fetchData(minValue , maxValue , "All") ;
    }

    updateSelectedRange();

    myRangeSlider.on('change', function() {
      updateSelectedRange();
    });
  });


  
  // Get all radio buttons
  const radioButtons = document.querySelectorAll('input[name="flexRadioDefault"]');

  // Add change event listener to each radio button
  radioButtons.forEach((radio) => {
    radio.addEventListener('change', (event) => {
      if (event.target.checked) {
       let dayes = event.target.value ;
       console.log(dayes) ; 
       fetchData(0 , 280 ,dayes) ;
      }
    });
  });