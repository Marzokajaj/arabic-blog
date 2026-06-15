
console.log("khara");
console.log('362');
/* fetch("https://api.example.com/data", { mode: 'no-cors'})
    .then(function(response){
        return response.json();
    })
    .then(function(data){
        console.log(data);
    });


async function get(){
    const response = await fetch("https://www.breakingbadapi.com/api/characters", { mode: 'no-cors'});
    const data = await response.json();
    console.log(data);
}
get();






fetch('https://www.breakingbadapi.com/api/characters', { mode: 'no-cors'})
  .then(response => {
    if (response.ok) {
      return response.json();
    } else {
      throw new Error('Request failed with status ' + response.status);
    }
  })
  .then(data => {
    console.log(data);
    console.log(data.name);
    console.log(data.age);
    data.forEach(item => {
      console.log(item.id);
      console.log(item.name);
    });
  })
  .catch(error => {
    console.log('An error occurred:', error);
  });


  */


fetch('https://server17.mp3quran.net/tafseer/tabri/039-1-7.mp3')
    .then(response => response.json())
  
    .then(json => console.log(json))



fetch('https://jsonplaceholder.typicode.com/todos/1')
    .then(response => response.json())
  
    .then(json => console.log(json))