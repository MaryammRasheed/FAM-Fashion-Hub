/* FAM FASHION HUB - Admin Dashboard JS
   Shared sidebar, theme toggle, demo data, and page initializers. */

(function () {
  // ---------- Theme ----------
  const root = document.documentElement;
  const savedTheme = localStorage.getItem('ffh-theme') || 'light';
  root.setAttribute('data-theme', savedTheme);

  window.toggleTheme = function () {
    const next = root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
    root.setAttribute('data-theme', next);
    localStorage.setItem('ffh-theme', next);
    document.querySelectorAll('[data-theme-icon]').forEach(el => {
      el.className = next === 'dark' ? 'fa-solid fa-sun' : 'fa-solid fa-moon';
    });
  };

  // ---------- Sidebar ----------
  window.toggleSidebar = function () {
    if (window.innerWidth < 992) {
      document.body.classList.toggle('sidebar-open');
    } else {
      document.body.classList.toggle('sidebar-collapsed');
      localStorage.setItem('ffh-sidebar', document.body.classList.contains('sidebar-collapsed') ? '1' : '0');
    }
  };

  document.addEventListener('DOMContentLoaded', () => {
    if (localStorage.getItem('ffh-sidebar') === '1' && window.innerWidth >= 992) {
      document.body.classList.add('sidebar-collapsed');
    }
    document.querySelectorAll('[data-theme-icon]').forEach(el => {
      el.className = root.getAttribute('data-theme') === 'dark' ? 'fa-solid fa-sun' : 'fa-solid fa-moon';
    });
    // Mark active nav
    const path = location.pathname.split('/').pop();
    document.querySelectorAll('.nav-item').forEach(a => {
      const href = (a.getAttribute('href') || '').split('/').pop();
      if (href && href === path) a.classList.add('active');
    });
  });

  // ---------- Demo data ----------
  window.FFH = {
    customers: [
      { id: 'C-1001', name: 'Aisha Khan', email: 'aisha@example.com', phone: '+92 300 1234567', orders: 12, spent: 48230, status: 'Active', joined: '2024-02-14' },
      { id: 'C-1002', name: 'Sara Ahmed', email: 'sara@example.com', phone: '+92 301 2345678', orders: 7, spent: 22100, status: 'Active', joined: '2024-04-02' },
      { id: 'C-1003', name: 'Mehwish Ali', email: 'mehwish@example.com', phone: '+92 302 3456789', orders: 21, spent: 91200, status: 'VIP', joined: '2023-09-19' },
      { id: 'C-1004', name: 'Zoya Hassan', email: 'zoya@example.com', phone: '+92 303 4567890', orders: 3, spent: 8400, status: 'Inactive', joined: '2024-08-11' },
      { id: 'C-1005', name: 'Nida Iqbal', email: 'nida@example.com', phone: '+92 304 5678901', orders: 15, spent: 56800, status: 'Active', joined: '2024-01-23' },
      { id: 'C-1006', name: 'Hira Malik', email: 'hira@example.com', phone: '+92 305 6789012', orders: 9, spent: 33400, status: 'Active', joined: '2024-03-30' },
      { id: 'C-1007', name: 'Fatima Noor', email: 'fatima@example.com', phone: '+92 306 7890123', orders: 4, spent: 12100, status: 'Active', joined: '2024-06-05' },
      { id: 'C-1008', name: 'Rabia Saleem', email: 'rabia@example.com', phone: '+92 307 8901234', orders: 18, spent: 67200, status: 'VIP', joined: '2023-11-02' },
    ],
    products: [
      { id: 1, name: 'Embroidered Lawn Suit', cat: 'Suits', price: 4500, stock: 24, status: 'Active', img: 'https://images.unsplash.com/photo-1551803091-e20673f15770?w=120' },
      { id: 2, name: 'Silk Pashmina Shawl',  cat: 'Shawls', price: 6800, stock: 8,  status: 'Active', img: 'https://images.unsplash.com/photo-1583846783214-7229a91b20ed?w=120' },
      { id: 3, name: 'Festive Frock - Rose', cat: 'Dresses', price: 7200, stock: 12, status: 'Active', img: 'https://images.unsplash.com/photo-1539109136881-3be0616acf4b?w=120' },
      { id: 4, name: 'Chiffon Dupatta',      cat: 'Accessories', price: 1500, stock: 60, status: 'Active', img: 'https://images.unsplash.com/photo-1610030469983-98e550d6193c?w=120' },
      { id: 5, name: 'Bridal Lehenga - Red', cat: 'Bridal', price: 38500, stock: 4,  status: 'Active', img: 'https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?w=120' },
      { id: 6, name: 'Casual Kurti - Pink',  cat: 'Kurtis', price: 2200, stock: 35, status: 'Active', img: 'https://images.unsplash.com/photo-1583391733956-6c78276477e2?w=120' },
      { id: 7, name: 'Pearl Drop Earrings',  cat: 'Jewelry', price: 1800, stock: 50, status: 'Active', img: 'https://images.unsplash.com/photo-1535632787350-4e68ef0ac584?w=120' },
      { id: 8, name: 'Velvet Shawl - Maroon',cat: 'Shawls', price: 5400, stock: 6,  status: 'Draft',  img: 'https://images.unsplash.com/photo-1591369822096-ffd140ec948f?w=120' },
    ],
    orders: [
      { id: '#ORD-2041', customer: 'Aisha Khan',  amount: 4500, method: 'Card',   status: 'Delivered',  date: '2025-04-14' },
      { id: '#ORD-2042', customer: 'Sara Ahmed',  amount: 8100, method: 'COD',    status: 'Processing', date: '2025-04-14' },
      { id: '#ORD-2043', customer: 'Mehwish Ali', amount: 38500,method: 'Card',   status: 'Shipped',    date: '2025-04-13' },
      { id: '#ORD-2044', customer: 'Zoya Hassan', amount: 2200, method: 'Wallet', status: 'Pending',    date: '2025-04-13' },
      { id: '#ORD-2045', customer: 'Nida Iqbal',  amount: 6800, method: 'Card',   status: 'Delivered',  date: '2025-04-12' },
      { id: '#ORD-2046', customer: 'Hira Malik',  amount: 1500, method: 'COD',    status: 'Cancelled',  date: '2025-04-11' },
      { id: '#ORD-2047', customer: 'Fatima Noor', amount: 7200, method: 'Card',   status: 'Processing', date: '2025-04-11' },
      { id: '#ORD-2048', customer: 'Rabia Saleem',amount: 5400, method: 'Card',   status: 'Shipped',    date: '2025-04-10' },
    ],
    invoices: [
      { id: 'INV-9001', order: '#ORD-2041', customer: 'Aisha Khan',  amount: 4500, due: '2025-04-21', status: 'Paid' },
      { id: 'INV-9002', order: '#ORD-2042', customer: 'Sara Ahmed',  amount: 8100, due: '2025-04-22', status: 'Unpaid' },
      { id: 'INV-9003', order: '#ORD-2043', customer: 'Mehwish Ali', amount: 38500,due: '2025-04-20', status: 'Paid' },
      { id: 'INV-9004', order: '#ORD-2044', customer: 'Zoya Hassan', amount: 2200, due: '2025-04-25', status: 'Unpaid' },
      { id: 'INV-9005', order: '#ORD-2045', customer: 'Nida Iqbal',  amount: 6800, due: '2025-04-19', status: 'Paid' },
    ],
    categories: [
      { name: 'Suits', slug: 'suits', count: 32, status: 'Active', date: '2023-08-12' },
      { name: 'Shawls', slug: 'shawls', count: 18, status: 'Active', date: '2023-09-04' },
      { name: 'Dresses', slug: 'dresses', count: 24, status: 'Active', date: '2023-10-22' },
      { name: 'Bridal', slug: 'bridal', count: 9, status: 'Active', date: '2024-01-15' },
      { name: 'Accessories', slug: 'accessories', count: 41, status: 'Active', date: '2023-08-30' },
      { name: 'Kurtis', slug: 'kurtis', count: 27, status: 'Active', date: '2024-02-11' },
      { name: 'Jewelry', slug: 'jewelry', count: 15, status: 'Inactive', date: '2024-03-28' },
    ]
  };

  function fmt(n){ return 'PKR ' + n.toLocaleString(); }
  function statusPill(s){
    const map = {
      'Delivered':'success','Paid':'success','Active':'success','VIP':'info',
      'Processing':'info','Shipped':'warning','Pending':'warning','Unpaid':'warning',
      'Cancelled':'danger','Inactive':'muted','Draft':'muted'
    };
    return `<span class="pill ${map[s]||'muted'}">${s}</span>`;
  }

  // ---------- Page initializers ----------
  window.initDashboard = function () {
    const ctx = document.getElementById('salesChart');
    if (ctx) {
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Nov','Dec','Jan','Feb','Mar','Apr'],
          datasets: [{
            label: 'Sales (PKR)',
            data: [120000, 185000, 142000, 220000, 268000, 312000],
            borderColor: '#e91e63',
            backgroundColor: 'rgba(233,30,99,.15)',
            tension: .4, fill: true, borderWidth: 3,
            pointBackgroundColor: '#e91e63', pointRadius: 4
          }]
        },
        options: { plugins:{legend:{display:false}}, scales:{y:{beginAtZero:true}} }
      });
    }
    const ctx2 = document.getElementById('topProductsChart');
    if (ctx2) {
      new Chart(ctx2, {
        type: 'bar',
        data: {
          labels: ['Lawn Suit','Pashmina','Frock','Dupatta','Lehenga','Kurti'],
          datasets: [{
            label: 'Units sold',
            data: [180, 142, 121, 98, 67, 154],
            backgroundColor: ['#e91e63','#ff80ab','#f48fb1','#fda085','#a18cd1','#84fab0'],
            borderRadius: 8
          }]
        },
        options: { plugins:{legend:{display:false}} }
      });
    }
    const tbody = document.getElementById('recentOrdersBody');
    if (tbody) {
      tbody.innerHTML = FFH.orders.slice(0,6).map(o => `
        <tr>
          <td><strong>${o.id}</strong></td>
          <td>${o.customer}</td>
          <td>${fmt(o.amount)}</td>
          <td>${statusPill(o.status)}</td>
          <td class="text-muted-2">${o.date}</td>
        </tr>
      `).join('');
    }
  };

  window.initCustomers = function () {
    const tbody = document.getElementById('customersBody');
    tbody.innerHTML = FFH.customers.map(c => `
      <tr>
        <td>${c.id}</td>
        <td><div class="avatar av-sm">${c.name[0]}</div></td>
        <td><strong>${c.name}</strong></td>
        <td>${c.email}</td>
        <td>${c.phone}</td>
        <td>${c.orders}</td>
        <td>${fmt(c.spent)}</td>
        <td>${statusPill(c.status)}</td>
        <td class="text-muted-2">${c.joined}</td>
        <td>
          <button class="btn btn-sm btn-outline-primary" title="Edit"><i class="fa fa-pen"></i></button>
          <button class="btn btn-sm btn-outline-danger ffh-delete" title="Delete"><i class="fa fa-trash"></i></button>
        </td>
      </tr>
    `).join('');
    $('#customersTable').DataTable({ pageLength: 6, lengthChange: false });
    bindDeletes();
  };

  window.initProducts = function () {
    const tbody = document.getElementById('productsBody');
    tbody.innerHTML = FFH.products.map(p => `
      <tr>
        <td><img src="${p.img}" class="prod-thumb" alt=""></td>
        <td><strong>${p.name}</strong></td>
        <td>${p.cat}</td>
        <td>${fmt(p.price)}</td>
        <td class="${p.stock < 10 ? 'text-danger fw-bold' : ''}">${p.stock}</td>
        <td>${statusPill(p.status)}</td>
        <td>
          <button class="btn btn-sm btn-outline-primary"><i class="fa fa-pen"></i></button>
          <button class="btn btn-sm btn-outline-danger ffh-delete"><i class="fa fa-trash"></i></button>
        </td>
      </tr>
    `).join('');
    $('#productsTable').DataTable({ pageLength: 6, lengthChange: false });
    bindDeletes();
  };

  window.initCategories = function () {
    const tbody = document.getElementById('categoriesBody');
    tbody.innerHTML = FFH.categories.map(c => `
      <tr>
        <td><strong>${c.name}</strong></td>
        <td><code>${c.slug}</code></td>
        <td>${c.count}</td>
        <td>${statusPill(c.status)}</td>
        <td class="text-muted-2">${c.date}</td>
        <td>
          <button class="btn btn-sm btn-outline-primary"><i class="fa fa-pen"></i></button>
          <button class="btn btn-sm btn-outline-danger ffh-delete"><i class="fa fa-trash"></i></button>
        </td>
      </tr>
    `).join('');
    $('#categoriesTable').DataTable({ pageLength: 6, lengthChange: false });
    bindDeletes();
  };

  window.initOrders = function () {
    const tbody = document.getElementById('ordersBody');
    tbody.innerHTML = FFH.orders.map(o => `
      <tr>
        <td><strong>${o.id}</strong></td>
        <td>${o.customer}</td>
        <td>${fmt(o.amount)}</td>
        <td>${o.method}</td>
        <td>${statusPill(o.status)}</td>
        <td class="text-muted-2">${o.date}</td>
        <td>
          <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#orderModal"><i class="fa fa-eye"></i></button>
          <button class="btn btn-sm btn-outline-secondary" onclick="window.print()"><i class="fa fa-print"></i></button>
          <button class="btn btn-sm btn-outline-danger ffh-delete"><i class="fa fa-trash"></i></button>
        </td>
      </tr>
    `).join('');
    $('#ordersTable').DataTable({ pageLength: 6, lengthChange: false });
    bindDeletes();
  };

  window.initInvoices = function () {
    const tbody = document.getElementById('invoicesBody');
    tbody.innerHTML = FFH.invoices.map(i => `
      <tr>
        <td><strong>${i.id}</strong></td>
        <td>${i.order}</td>
        <td>${i.customer}</td>
        <td>${fmt(i.amount)}</td>
        <td class="text-muted-2">${i.due}</td>
        <td>${statusPill(i.status)}</td>
        <td>
          <button class="btn btn-sm btn-outline-secondary" onclick="window.print()"><i class="fa fa-print"></i></button>
          <button class="btn btn-sm btn-outline-primary"><i class="fa fa-download"></i></button>
        </td>
      </tr>
    `).join('');
    $('#invoicesTable').DataTable({ pageLength: 6, lengthChange: false });
  };

  window.initInventory = function () {
    const tbody = document.getElementById('inventoryBody');
    tbody.innerHTML = FFH.products.map(p => `
      <tr>
        <td><img src="${p.img}" class="prod-thumb" alt=""></td>
        <td><strong>${p.name}</strong></td>
        <td><code>SKU-${1000+p.id}</code></td>
        <td class="${p.stock < 10 ? 'text-danger fw-bold' : ''}">${p.stock}</td>
        <td>10</td>
        <td>${p.stock < 10 ? '<span class="pill danger">Reorder</span>' : '<span class="pill success">OK</span>'}</td>
        <td class="text-muted-2">2025-04-08</td>
        <td>
          <button class="btn btn-sm btn-outline-primary"><i class="fa fa-plus"></i></button>
          <button class="btn btn-sm btn-outline-danger"><i class="fa fa-minus"></i></button>
        </td>
      </tr>
    `).join('');
    $('#inventoryTable').DataTable({ pageLength: 6, lengthChange: false });
  };

  window.initCalendar = function () {
    const el = document.getElementById('calendar');
    if (!el || !window.FullCalendar) return;
    const cal = new FullCalendar.Calendar(el, {
      initialView: 'dayGridMonth',
      height: 650,
      headerToolbar: { left:'prev,next today', center:'title', right:'dayGridMonth,timeGridWeek' },
      events: [
        { title: 'Order #ORD-2043 delivery', date: '2025-04-15', color: '#e91e63' },
        { title: 'Restock: Pashmina Shawls', date: '2025-04-18', color: '#a18cd1' },
        { title: 'Eid Sale Launch', start: '2025-04-22', color: '#ff80ab' },
        { title: 'Vendor Meeting', date: '2025-04-25', color: '#84fab0', textColor:'#0d3b3b' }
      ],
      dateClick: (info) => {
        Swal.fire({ title:'Add event', input:'text', inputLabel: info.dateStr, showCancelButton:true })
          .then(r => { if(r.isConfirmed && r.value){
            cal.addEvent({ title: r.value, date: info.dateStr, color:'#e91e63' });
            toast('Event added');
          }});
      }
    });
    cal.render();
  };

  // ---------- Helpers ----------
  function bindDeletes(){
    document.querySelectorAll('.ffh-delete').forEach(btn => {
      btn.addEventListener('click', () => {
        Swal.fire({
          title: 'Delete this item?',
          text: 'This action cannot be undone.',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#e91e63',
          confirmButtonText: 'Yes, delete'
        }).then(r => {
          if (r.isConfirmed) {
            btn.closest('tr').remove();
            toast('Deleted successfully');
          }
        });
      });
    });
  }

  function toast(msg, icon='success'){
    Swal.fire({ toast:true, position:'top-end', timer:2200, showConfirmButton:false, icon, title: msg });
  }
  window.ffhToast = toast;

  // Generic form submit handler
  window.ffhSubmit = function (e, msg='Saved successfully') {
    e.preventDefault();
    toast(msg);
    return false;
  };
})();
// FAM FASHION HUB Dashboard Main JS

// Toggle Sidebar
function toggleSidebar() {
    document.body.classList.toggle('sidebar-open');
}

// Toggle Theme
function toggleTheme() {
    document.body.classList.toggle('dark-theme');
    const icon = document.querySelector('[data-theme-icon]');
    if (document.body.classList.contains('dark-theme')) {
        icon.classList.remove('fa-moon');
        icon.classList.add('fa-sun');
        localStorage.setItem('theme', 'dark');
    } else {
        icon.classList.remove('fa-sun');
        icon.classList.add('fa-moon');
        localStorage.setItem('theme', 'light');
    }
}

// Load Theme from localStorage
function loadTheme() {
    const theme = localStorage.getItem('theme');
    if (theme === 'dark') {
        document.body.classList.add('dark-theme');
        const icon = document.querySelector('[data-theme-icon]');
        if (icon) {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
        }
    }
}

// Initialize Dashboard Charts
function initDashboard() {
    loadTheme();

    // Sales Chart
    const salesCtx = document.getElementById('salesChart')?.getContext('2d');
    if (salesCtx) {
        new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Sales',
                    data: [12000, 19000, 15000, 25000, 22000, 30000],
                    borderColor: '#e91e63',
                    backgroundColor: 'rgba(233,30,99,0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: { responsive: true, maintainAspectRatio: true }
        });
    }

    // Top Products Chart
    const productsCtx = document.getElementById('topProductsChart')?.getContext('2d');
    if (productsCtx) {
        new Chart(productsCtx, {
            type: 'bar',
            data: {
                labels: ['Kurti', 'Jeans', 'Shirt', 'Shoes', 'Bag'],
                datasets: [{
                    label: 'Units Sold',
                    data: [120, 98, 85, 62, 45],
                    backgroundColor: '#a18cd1',
                    borderRadius: 8
                }]
            },
            options: { responsive: true, maintainAspectRatio: true }
        });
    }
}

// Initialize DataTables
function initDataTable(tableId) {
    if ($(tableId).length) {
        $(tableId).DataTable({
            pageLength: 10,
            responsive: true,
            language: { search: "Search:" }
        });
    }
}

// SweetAlert Confirmation
function confirmDelete(itemName, callback) {
    Swal.fire({
        title: 'Are you sure?',
        text: `You won't be able to revert this ${itemName}!`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e91e63',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed && callback) callback();
    });
}

// Show Toast Message
function showToast(message, type = 'success') {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    });
    Toast.fire({ icon: type, title: message });
}

// Load Recent Orders (if needed via AJAX)
function loadRecentOrders() {
    fetch('/api/admin/recent-orders')
        .then(response => response.json())
        .then(data => {
            const tbody = document.getElementById('recentOrdersBody');
            if (tbody && data.orders) {
                tbody.innerHTML = data.orders.map(order => `
                    <tr>
                        <td>#${order.id}</td>
                        <td>${order.customer_name}</td>
                        <td>PKR ${order.amount}</td>
                        <td><span class="badge bg-${order.status_class}">${order.status}</span></td>
                        <td>${order.date}</td>
                    </tr>
                `).join('');
            }
        })
        .catch(error => console.log('Error loading orders:', error));
}

// Document Ready
$(document).ready(function() {
    // Initialize DataTables if present
    if ($('.data-table').length) {
        $('.data-table').DataTable({
            pageLength: 10,
            responsive: true
        });
    }

    // Close sidebar when clicking outside on mobile
    $(document).on('click', function(e) {
        if ($(window).width() <= 992) {
            if (!$(e.target).closest('.sidebar').length && !$(e.target).closest('.icon-btn').length) {
                document.body.classList.remove('sidebar-open');
            }
        }
    });
});
