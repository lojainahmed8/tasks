// function find(arr) {

//     arr.sort((a, b) => a - b);
    
    
//     let secondLowest;
//     for (let i = 0; i < arr.length; i++) {
//         if (arr[i] !== arr[0]) {
//             secondLowest = arr[i];
//             break;
//         }
//     }
    
//     let secondGreatest;
//     let lastIndex = arr.length - 1;
//     for (let i = lastIndex; i >= 0; i--) {
//         if (arr[i] !== arr[lastIndex]) {
//             secondGreatest = arr[i];
//             break;
//         }
//     }
    
//     return `${secondLowest},${secondGreatest}`;
// }

// const input = [1, 2, 3, 4, 5, 1, 5];
// console.log(find(input)); 



// function capital(str) {
    
//     let words = str.split(' ');
    
    
//     for (let i = 0; i < words.length; i++) {
        
//         words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
//     }
    
//     return words.join(' ');
// }

// const input = 'the quick brown fox';
// console.log(capital(input)); 


// ============task3 two ways=========
// const student = {
//   name: "John Doe",
//   age: 20,
//   grades: {
//     math: 90,
//     science: 85,
//     literature: 88
//   },
//   contactInfo: {
//     email: "johndoe@example.com",
//     phone: "123-456-7890"
//   }
// };

// function printStudentInfo(obj) {
//   console.log(`name: ${obj.name}`);
//   console.log(`age: ${obj.age}`);
//   console.log(`grades.math: ${obj.grades.math}`);
//   console.log(`grades.science: ${obj.grades.science}`);
//   console.log(`grades.literature: ${obj.grades.literature}`);
//   console.log(`contactInfo.email: ${obj.contactInfo.email}`);
//   console.log(`contactInfo.phone: ${obj.contactInfo.phone}`);
// }

// // printStudentInfo(student);



// const studentName = prompt("enter name");
// const studentAge = Number(prompt("entre age"));

// const mathGrade = Number(prompt(" entre math degree:"));
// const scienceGrade = Number(prompt(" science degree:"));
// const literatureGrade = Number(prompt(" lecterature:"));


// const userEmail = prompt("email");
// const userPhone = prompt("entre phone:");

// const student = {
//   name: studentName,
//   age: studentAge,
//   grades: {
//     math: mathGrade,
//     science: scienceGrade,
//     literature: literatureGrade
//   },
//   contactInfo: {
//     email: userEmail,
//     phone: userPhone
//   }
// };


// function printStudentInfo(obj) {
//   console.log(`name: ${obj.name}`);
//   console.log(`age: ${obj.age}`);
//   console.log(`grades.math: ${obj.grades.math}`);
//   console.log(`grades.science: ${obj.grades.science}`);
//   console.log(`grades.literature: ${obj.grades.literature}`);
//   console.log(`contactInfo.email: ${obj.contactInfo.email}`);
//   console.log(`contactInfo.phone: ${obj.contactInfo.phone}`);
// }


// printStudentInfo(student);




// const library = {
//   books: []
// };

// function addBooksFromUser(lib) {
//   let keepAdding = true;

//   while (keepAdding) {
    
//     const title = prompt("entre book tittle:");
//     const author = prompt("author:");
//     const year = Number(prompt(" year puplished :"));

    
//     lib.books.push({
//       title: title,
//       author: author,
//       year: year
//     });

    
//     keepAdding = confirm("do you want extra books");
//   }
// }


// function logBookTitles(lib) {
//   console.log("-- books that added ---");
//   lib.books.forEach(book => {
//     console.log(book.title);
//   });
// }


// addBooksFromUser(library);
// logBookTitles(library); 




// function applyOperation(num1, num2, operation) {
//   return operation(num1, num2);}

// function add(a, b) {
//   return a + b;
// }

// function multiply(a, b) {
//   return a * b;
// }


// console.log(applyOperation(5, 3, add));                   
// console.log(applyOperation(5, 3, multiply));              
// console.log(applyOperation(10, 2, (a, b) => a - b));      
// console.log(applyOperation(10, 2, (a, b) => a / b));      





function square(num) {
  return num * num;
}

function processArray(arr, callback) {
  var result = [];
  for (var i = 0; i < arr.length; i++) {
    result.push(callback(arr[i]));
  }
  return result;
}

var numbers = [1, 2, 3, 4, 5];
var output = processArray(numbers, square);

console.log(output.join(', ')); 