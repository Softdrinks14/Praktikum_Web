function sumNumbers(){
    let firstNumber = document.getElementById("firstNumber").value;
    let secondNumber = document.getElementById("secondNumber").value;

    if(firstNumber === "" || secondNumber === ""){
        alert("Input tidak boleh kosong");
        return;
    }

    let result = parseFloat(firstNumber) + parseFloat(secondNumber);
    document.getElementById("result").textContent = result;
    console.log(result);
}


function clearForm(){
    document.getElementById("firstNumber").value = "";
    document.getElementById("secondNumber").value = "";
    document.getElementById("result").textContent = "0";
}