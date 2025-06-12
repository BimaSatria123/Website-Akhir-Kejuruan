<?php
include "database.php";
session_start();

if (!isset($_SESSION['Login'])) {
  header("Location: index.php");
  exit;
}

$edit = false;
$username = $password = $alamat = "";
$id_users = "";

if (isset($_GET['edit'])) {
  $edit = true;
  $id_users = $_GET['edit'];
  $query = $db->query("SELECT * FROM user WHERE id_users=$id_users");
  $data = $query->fetch_assoc();
  $username = $data['username'];
  $password = $data['password'];
  $alamat = $data['alamat'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>User CRUD</title>
  <link rel="stylesheet" href="../style/user.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateX(-20px); }
      to { opacity: 1; transform: translateX(0); }
    }
    
    .sidebar-item {
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }
    
    .sidebar-item:hover {
      background: rgba(255, 255, 255, 0.1);
      transform: translateX(5px);
    }
    
    .sidebar-item::before {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      height: 100%;
      width: 3px;
      background: #3b82f6;
      transform: scaleY(0);
      transition: transform 0.2s ease;
    }
    
    .sidebar-item:hover::before {
      transform: scaleY(1);
    }
    
    .sidebar-item.active {
      background: rgba(255, 255, 255, 0.1);
    }
    
    .sidebar-item.active::before {
      transform: scaleY(1);
    }
    
    #background-side {
      background: linear-gradient(135deg, #1a1a1a 0%, #000000 100%);
      box-shadow: 5px 0 15px rgba(0, 0, 0, 0.2);
      height: 850px;
    }
    
    .admin-avatar {
      border: 3px solid #3b82f6;
      transition: all 0.3s ease;
    }
    
    .admin-avatar:hover {
      transform: scale(1.05);
      box-shadow: 0 0 15px rgba(59, 130, 246, 0.5);
    }
    
    .nav-item {
      animation: fadeIn 0.5s ease forwards;
    }
    
    .nav-item:nth-child(1) { animation-delay: 0.1s; }
    .nav-item:nth-child(2) { animation-delay: 0.2s; }
    .nav-item:nth-child(3) { animation-delay: 0.3s; }
  </style>
</head>
<body class="bg-gray-100">
<div class="flex">
  <div class="w-64  p-6 flex flex-col" id="background-side">
    <div class="flex flex-col items-center mb-8">
      <img src="../assets/icons8-admin-100.png" class="admin-avatar w-20 h-20 rounded-full mb-4">
      <h1 class="text-3xl font-bold bg-gradient-to-r from-blue-400 to-blue-600 bg-clip-text text-transparent">Admin Panel</h1>
      <p class="text-gray-400 text-sm mt-2">Welcome back, Admin</p>
    </div>
    
    <nav class="flex-1 space-y-3">
      <a href="user.php" class="sidebar-item active flex items-center p-3 rounded-lg text-white group">
        <i class="fas fa-users-cog mr-3 text-blue-400 group-hover:text-blue-300"></i>
        <span>User Settings</span>
        <i class="fas fa-chevron-right ml-auto text-xs opacity-0 group-hover:opacity-100 transition-opacity"></i>
      </a>
      
      <a href="../page/statis.html" class="sidebar-item flex items-center p-3 rounded-lg text-white group">
        <i class="fas fa-chart-line mr-3 text-blue-400 group-hover:text-blue-300"></i>
        <span>Statistics</span>
        <i class="fas fa-chevron-right ml-auto text-xs opacity-0 group-hover:opacity-100 transition-opacity"></i>
      </a>
    </nav>
    
    <div class="mt-auto">
      <a href="../login.php" class="sidebar-item flex items-center p-3 rounded-lg text-white group border-t border-gray-800 hover:border-gray-700">
        <i class="fas fa-sign-out-alt mr-3 text-red-400 group-hover:text-red-300"></i>
        <span>Logout</span>
        <i class="fas fa-chevron-right ml-auto text-xs opacity-0 group-hover:opacity-100 transition-opacity"></i>
      </a>
    </div>
  </div>

  <div class="flex-1 p-8">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
      <h1 class="text-2xl font-bold text-gray-800 mb-6">ADD USER</h1>
      <form action="user_save.php" method="POST" class="space-y-4">
        <input type="hidden" name="id_users" value="<?= $id_users ?>">
        <div class="space-y-2">
          <label class="text-gray-700">Username</label>
          <input name="username" value="<?= $username ?>" placeholder="Username" class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div class="space-y-2">
          <label class="text-gray-700">Password</label>
          <input name="password" value="<?= $password ?>" placeholder="Password" class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div class="space-y-2">
          <label class="text-gray-700">Alamat</label>
          <input name="alamat" value="<?= $alamat ?>" placeholder="Alamat" class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <button name="<?= $edit ? 'update' : 'save' ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md shadow-md transition transform hover:scale-105">
          <?= $edit ? 'Update' : 'Simpan' ?>
          <i class="fas <?= $edit ? 'fa-sync-alt' : 'fa-save' ?> ml-2"></i>
        </button>
      </form>
      
      <div class="mt-10">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">User Settings</h1>
        <div class="overflow-x-auto rounded-lg shadow-md">
          <table class="w-full table-auto">
            <thead class="bg-gray-800 text-white">
              <tr>
                <th class="px-6 py-3 text-left">Username</th>
                <th class="px-6 py-3 text-left">Alamat</th>
                <th class="px-6 py-3 text-left">Aksi</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <?php
              $result = $db->query("SELECT * FROM user");
              while ($row = $result->fetch_assoc()):
                $id = $row['id_users'];
              ?>
              <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4"><?= htmlspecialchars($row['username']) ?></td>
                <td class="px-6 py-4"><?= htmlspecialchars($row['alamat']) ?></td>
                <td class="px-6 py-4 space-x-3">
                  <a href="?edit=<?= $id ?>" class="text-blue-600 hover:text-blue-800 transition">
                    <i class="fas fa-edit mr-1"></i>Edit
                  </a>
                  <a href="user_delete.php?id=<?= $id ?>" class="text-red-600 hover:text-red-800 transition" onclick="return confirm('Yakin hapus?')">
                    <i class="fas fa-trash-alt mr-1"></i>Hapus
                  </a>
                </td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      <div></div>
      </div>
    </div>
  </div>
</div>

<script>
  // Add active class to current nav item
  document.addEventListener('DOMContentLoaded', function() {
    const currentPage = window.location.pathname.split('/').pop();
    const navItems = document.querySelectorAll('.sidebar-item');
    
    navItems.forEach(item => {
      const link = item.getAttribute('href').split('/').pop();
      if (link === currentPage) {
        item.classList.add('active');
      } else {
        item.classList.remove('active');
      }
    });
  });
</script>
</body>
</html>