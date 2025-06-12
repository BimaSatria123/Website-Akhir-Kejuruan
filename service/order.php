<?php
include "database.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $menu = $_POST['menu'];
  $nama = $_POST['nama'];
  $jumlah = $_POST['jumlah'];
  $alamat = $_POST['alamat'];

  
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesanan Berhasil | Warung Jawa Barat</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
    }
    .confirmation-card {
      background: white;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      transform: translateY(0);
      transition: all 0.3s ease;
    }
    .confirmation-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
    }
    .checkmark {
      width: 80px;
      height: 80px;
      background: linear-gradient(135deg, #4ade80 0%, #22c55e 100%);
      animation: scaleIn 0.5s cubic-bezier(0.25, 1.7, 0.35, 1.5);
    }
    @keyframes scaleIn {
      from { transform: scale(0); opacity: 0; }
      to { transform: scale(1); opacity: 1; }
    }
    .order-detail {
      border-left: 3px solid #e4e8f0;
      transition: all 0.3s ease;
    }
    .order-detail:hover {
      border-left-color: #22c55e;
      background: #f8fafc;
    }
    .back-btn {
      position: relative;
      overflow: hidden;
      transition: all 0.3s ease;
    }
    .back-btn::after {
      content: '';
      position: absolute;
      width: 100%;
      height: 100%;
      background: rgba(59, 130, 246, 0.1);
      top: 0;
      left: -100%;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .back-btn:hover::after {
      left: 0;
    }
    .pulse {
      animation: pulse 2s infinite;
    }
    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.05); }
      100% { transform: scale(1); }
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
  <div class="confirmation-card w-full max-w-md overflow-hidden">
    <!-- Animated Header -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-500 p-6 text-center">
      <div class="checkmark rounded-full flex items-center justify-center mx-auto mb-4">
        <i class="fas fa-check text-white text-3xl"></i>
      </div>
      <h1 class="text-2xl font-bold text-white mb-1">Pesanan Berhasil!</h1>
      <p class="text-blue-100">Terima kasih telah memesan di Warung Jawa Barat</p>
    </div>
    
    <!-- Order Status -->
    <div class="bg-yellow-50 p-4 text-center border-b border-yellow-100">
      <div class="flex items-center justify-center gap-2 text-yellow-600">
        <i class="fas fa-clock pulse"></i>
        <span class="font-medium">Pesanan sedang diproses dan akan segera diantar</span>
      </div>
    </div>
    
    <!-- Order Details -->
    <div class="p-6">
      <div class="space-y-4 mb-6">
        <div class="order-detail pl-4 py-2">
          <p class="text-sm text-gray-500">Menu yang dipesan</p>
          <p class="font-medium text-gray-800"><?= htmlspecialchars($menu) ?></p>
        </div>
        
        <div class="order-detail pl-4 py-2">
          <p class="text-sm text-gray-500">Atas nama</p>
          <p class="font-medium text-gray-800"><?= htmlspecialchars($nama) ?></p>
        </div>
        
        <div class="order-detail pl-4 py-2">
          <p class="text-sm text-gray-500">Jumlah pesanan</p>
          <p class="font-medium text-gray-800"><?= htmlspecialchars($jumlah) ?> porsi</p>
        </div>
        
        <div class="order-detail pl-4 py-2">
          <p class="text-sm text-gray-500">Alamat pengiriman</p>
          <p class="font-medium text-gray-800"><?= htmlspecialchars($alamat) ?></p>
        </div>
      </div>
      
      <!-- Estimated Delivery -->
      <div class="bg-blue-50 rounded-lg p-4 mb-6">
        <div class="flex items-center gap-3">
          <div class="bg-blue-100 p-2 rounded-full">
            <i class="fas fa-truck text-blue-600"></i>
          </div>
          <div>
            <p class="text-sm text-gray-600">Estimasi pengantaran</p>
            <p class="font-medium text-blue-600">30-45 menit</p>
          </div>
        </div>
      </div>
      
      <!-- Action Button -->
      <a href="../menu.php" class="back-btn inline-flex items-center justify-center w-full py-3 px-4 border border-blue-500 text-blue-600 font-medium rounded-lg hover:bg-blue-50 transition-all">
        <i class="fas fa-arrow-left mr-2"></i>
        Kembali ke Menu Utama
      </a>
    </div>
    
    <!-- Order Number (optional) -->
    <div class="bg-gray-50 p-4 text-center border-t border-gray-100">
      <p class="text-sm text-gray-500">No. Pesanan: #<?= rand(1000, 9999) ?>-<?= rand(100, 999) ?></p>
    </div>
  </div>

  <script>
    // Simple animation trigger
    document.addEventListener('DOMContentLoaded', () => {
      const elements = document.querySelectorAll('.order-detail');
      elements.forEach((el, index) => {
        setTimeout(() => {
          el.style.opacity = '1';
          el.style.transform = 'translateY(0)';
        }, index * 100);
      });
    });
  </script>
</body>
</html>
<?php
} else {
  echo "<div class='fixed inset-0 flex items-center justify-center bg-white p-4'>
          <div class='text-center p-6 bg-red-50 rounded-lg max-w-md'>
            <i class='fas fa-exclamation-triangle text-red-500 text-4xl mb-3'></i>
            <h2 class='text-xl font-semibold text-red-600 mb-2'>Akses Tidak Valid</h2>
            <p class='text-gray-600 mb-4'>Halaman ini hanya dapat diakses setelah melakukan pemesanan.</p>
            <a href='../menu.php' class='inline-block px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700 transition'>Kembali ke Menu</a>
          </div>
        </div>";
}
?>