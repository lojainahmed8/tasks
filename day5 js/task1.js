
// async function fetchProducts() {
//   try {
    
//     let response = await fetch("https://dummyjson.com/products");

//     if (!response.ok) {
//       throw new Error(`HTTP Error Status: ${response.status}`);
//     }

//     let result = await response.json();

//     console.log(typeof result);
//     console.log(result);

//   } catch (error) {
//     console.log("Error with fetching data:", error);
//   }
// }

// fetchProducts();



fetch("https://dummyjson.com/products")
  .then((response) => {
    if (!response.ok) {
      throw new Error(`HTTP Error Status: ${response.status}`);
    }
    return response.json(); 
  })
  .then((result) => {
    console.log(typeof result);
    console.log(result);
  })
  .catch((error) => {
    console.log("Error with fetching data:", error);
  });

  