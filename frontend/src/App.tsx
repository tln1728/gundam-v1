import { BrowserRouter, Navigate, Route, Routes } from "react-router-dom";
import Layout from "./components/Layout";
import Home from "./pages/Home";
import ProductDetail from "./pages/ProductDetail";
import AdminDashBoard from "./pages/admin/AdminDashboard";
import AdminLayout from "./components/AdminLayout";

function App() {
  return (
    <BrowserRouter>
      <Routes>
        {/* Public routes */}
        <Route path="/" element={<Layout />}>
          <Route index element={<Home />} />
          <Route path="/home" element={<Navigate to="/" replace />} />
          <Route path="/product-detail" element={<ProductDetail />} />
        </Route>
        {/* Admin routes */}
        <Route path="/admin" element={<AdminLayout />}>
          <Route path="/admin" element={<AdminDashBoard />} />
        </Route>
      </Routes>
    </BrowserRouter >
  );
}

export default App
