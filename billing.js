const payBtn = document.getElementById('pay-btn');

payBtn.addEventListener('click', (event) => {
  event.preventDefault(); // Prevent form submission
  
  const totalAmount = localStorage.getItem('totalAmount');
  const amount = parseInt(totalAmount) * 100; // Convert to smallest unit of currency (paisa)
  
  const options = {
    key: 'rzp_test_W6o3G1bafo3Ylq', // Replace with your key_id
    amount: amount, // Pass the total amount to Razorpay
    currency: 'INR',
    name: 'SERENITY FOUNDATION',
    description: 'Payment for your order',
    image: 'https://example.com/your_logo',
    handler: function (response) {
      alert('Payment successful!');
      // You can also call a server-side function to verify the payment
    },
    prefill: {
      name: '',
      email: '',
      contact: '',
    },
    notes: {
      address: 'Hello World',
    },
    theme: {
      color: '#528FF0',
    },
  };

  const rzp = new Razorpay(options);
  rzp.open();
});

