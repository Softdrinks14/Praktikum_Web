document.getElementById("submit-btn").addEventListener("click", function (e) {
    e.preventDefault();
  
    const data = {
      name: document.getElementById("name").value,
      email: document.getElementById("email").value,
      room_type: document.getElementById("room-type").value,
      check_in: document.getElementById("check-in").value,
      check_out: document.getElementById("check-out").value,
      phone: document.getElementById("phone").value,
      total_room: parseInt(document.getElementById("total-room").value, 10),
      payment_method: document.getElementById("payment-method").value,
    };

    fetch('../php/booking_api.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data),
    })
      .then((response) => response.json())
      .then((result) => {
        if (result.message === "Booking created successfully") {
          alert("Booking berhasil dibuat!");
        } else {
          alert("Gagal membuat booking: " + result.message);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        alert("Terjadi kesalahan!");
      });
  });
  