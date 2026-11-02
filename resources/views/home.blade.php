<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SenjaLoka - Eksplor Lombok Tengah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-blue: #2b7a8c;
            --light-blue: #eaf6f8;
            --sky-blue: #5eb7c9;
            --white: #ffffff;
            --dark: #1f2e35;
            --sunset: #ff7e5f;
            --sunset-light: #feb47b;
            --text-grey: #5a6b75;
            --shadow: 0 10px 30px rgba(0,0,0,0.08);
            --card-radius: 16px;
            --transition: all 0.3s ease;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; scroll-behavior: smooth; }
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--dark);
            background: var(--white);
            line-height: 1.6;
        }
        a { text-decoration: none; color: inherit; }
        ul { list-style: none; }
        img { width: 100%; height: 100%; object-fit: cover; display: block; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        .section-padding { padding: 80px 0; }
        .btn {
            display: inline-block; padding: 12px 30px; border-radius: 50px;
            font-weight: 600; transition: var(--transition); border: none;
            cursor: pointer; font-family: 'Poppins', sans-serif;
        }
        .btn-primary { background: var(--primary-blue); color: var(--white); }
        .btn-primary:hover { background: #1e5e6e; transform: translateY(-3px); box-shadow: 0 5px 15px rgba(43,122,140,0.3); }
        .btn-sunset { background: linear-gradient(135deg, var(--sunset), var(--sunset-light)); color: var(--white); }
        .btn-sunset:hover { transform: translateY(-3px); box-shadow: 0 5px 15px rgba(255,126,95,0.3); }
        .btn-outline { background: transparent; border: 2px solid var(--white); color: var(--white); }
        .btn-outline:hover { background: var(--white); color: var(--primary-blue); }
        .btn-outline-sunset { background: transparent; border: 2px solid var(--sunset); color: var(--sunset); }
        .btn-outline-sunset:hover { transform: translateY(-3px); box-shadow: 0 5px 15px rgba(255,126,95,0.3); background: var(--sunset); color: #fff; }
        .section-title { font-size: 2.2rem; font-weight: 700; margin-bottom: 10px; color: var(--dark); text-align: center; }
        .section-subtitle { color: var(--text-grey); text-align: center; max-width: 600px; margin: 0 auto 50px; font-size: 1.1rem; }

        #navbar {
            position: sticky; top: 0; z-index: 1000;
            background: rgba(255,255,255,0.97); backdrop-filter: blur(5px);
            box-shadow: 0 2px 10px rgba(0,0,0,0.05); transition: var(--transition);
        }
        .nav-container {
            display: flex; justify-content: space-between; align-items: center;
            padding: 15px 20px; max-width: 1200px; margin: 0 auto;
        }
        .logo { font-size: 1.8rem; font-weight: 800; color: var(--primary-blue); }
        .logo span { color: var(--sunset); }
        .nav-links { display: flex; gap: 25px; align-items: center; }
        .nav-links a { font-weight: 500; font-size: 0.95rem; transition: color 0.3s; }
        .nav-links a:hover { color: var(--primary-blue); }
        .mobile-toggle { display: none; font-size: 1.5rem; cursor: pointer; }


        .hero {
            height: 90vh; width: 100%; position: relative; overflow: hidden;
            display: flex; align-items: center; text-align: center; color: var(--white);
        }
        .hero-slides { position: absolute; inset: 0; z-index: 0; }
        .hero-slide {
            position: absolute; inset: 0; background-size: cover; background-position: center;
            opacity: 0; transition: opacity 1.2s ease;
        }
        .hero-slide.active { opacity: 1; }
        .hero-slide::after {
            content: ''; position: absolute; inset: 0;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.4));
        }
        .hero-content { position: relative; z-index: 2; max-width: 800px; margin: 0 auto; padding: 0 20px; }
        .hero h1 { font-size: 3.5rem; font-weight: 700; margin-bottom: 20px; line-height: 1.2; }
        .hero p { font-size: 1.2rem; margin-bottom: 30px; font-weight: 300; }
        .hero-buttons { display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; }
        .hero-dots {
            position: absolute; bottom: 30px; left: 50%; transform: translateX(-50%);
            z-index: 3; display: flex; gap: 10px;
        }
        .hero-dot {
            width: 13px; height: 13px; border-radius: 50%;
            background: rgba(255,255,255,0.4); cursor: pointer; transition: all 0.3s;
            border: 2px solid rgba(255,255,255,0.8);
        }
        .hero-dot.active { background: #fff; transform: scale(1.15); }
        .hero-arrow {
            position: absolute; top: 50%; transform: translateY(-50%); z-index: 3;
            width: 50px; height: 50px; border-radius: 50%; border: none;
            background: rgba(255,255,255,0.15); color: #fff; font-size: 1.3rem;
            cursor: pointer; transition: all 0.3s; display: flex; align-items: center; justify-content: center;
            backdrop-filter: blur(4px);
        }
        .hero-arrow:hover { background: rgba(255,255,255,0.3); transform: translateY(-50%) scale(1.1); }
        .hero-arrow-left { left: 20px; }
        .hero-arrow-right { right: 20px; }

        .search-tour { background: var(--primary-blue); padding: 40px 0; color: var(--white); }
        .search-content { display: flex; flex-direction: column; gap: 20px; }
        .search-title { font-size: 1.2rem; font-weight: 600; display: flex; align-items: center; gap: 10px; }
        .search-form { display: flex; gap: 15px; align-items: flex-end; flex-wrap: wrap; }
        .form-group { flex: 1; min-width: 180px; position: relative; }
        .form-group label { display: block; font-size: 0.85rem; margin-bottom: 8px; font-weight: 500; }
        .form-group .select-hidden { display: none; }
        .form-group .select-box {
            width: 100%; padding: 12px 15px; border-radius: 8px; border: none;
            background: var(--white); font-family: 'Poppins', sans-serif; color: var(--dark); outline: none; cursor: pointer;
            display: flex; align-items: center; justify-content: space-between; gap: 8px;
            position: relative; z-index: 2;
        }
        .form-group .select-box i { font-size: 0.75rem; color: var(--text-grey); transition: transform 0.2s; }
        .form-group .select-box.open i { transform: rotate(180deg); }
        .form-group .select-dropdown {
            position: absolute; top: 100%; left: 0; right: 0; z-index: 10;
            background: var(--white); border-radius: 8px; box-shadow: 0 8px 30px rgba(0,0,0,0.15);
            display: none; overflow: hidden; margin-top: 4px;
        }
        .form-group .select-dropdown.show { display: block; }
        .form-group .select-dropdown .opt {
            padding: 10px 15px; cursor: pointer; font-size: 0.9rem; color: var(--dark);
            transition: background 0.15s; font-family: 'Poppins', sans-serif;
        }
        .form-group .select-dropdown .opt:hover { background: var(--light-blue); }
        .form-group .select-dropdown .opt.selected { background: var(--primary-blue); color: #fff; font-weight: 600; }
        .search-btn {
            background: var(--sunset); color: var(--white); padding: 12px 30px; border: none;
            border-radius: 8px; font-weight: 600; font-family: 'Poppins', sans-serif;
            cursor: pointer; transition: var(--transition); width: 100%; min-width: 140px;
        }
        .search-btn:hover { background: #e5684d; }
        .search-btn-reset {
            background: rgba(255,255,255,0.15); color: var(--white); padding: 12px 20px; border: 1px solid rgba(255,255,255,0.3);
            border-radius: 8px; font-weight: 500; font-family: 'Poppins', sans-serif;
            cursor: pointer; transition: var(--transition); font-size: 0.85rem; min-width: 100px;
        }
        .search-btn-reset:hover { background: rgba(255,255,255,0.25); }
        .search-info {
            display: flex; justify-content: space-between; align-items: center;
            margin-bottom: 20px; gap: 15px; flex-wrap: wrap;
        }
        .search-info .result-count { font-size: 0.9rem; color: var(--text-grey); font-weight: 500; }
        .search-info .result-count strong { color: var(--primary-blue); }
        .search-info .clear-filter {
            background: none; border: 1px solid #ddd; padding: 6px 18px; border-radius: 20px;
            font-size: 0.8rem; color: var(--text-grey); cursor: pointer; transition: var(--transition);
            font-family: 'Poppins', sans-serif; display: none;
        }
        .search-info .clear-filter:hover { border-color: var(--sunset); color: var(--sunset); }
        .search-info .clear-filter.show { display: inline-block; }
        .no-results { text-align: center; padding: 60px 20px; display: none; }
        .no-results i { font-size: 3rem; color: #ddd; margin-bottom: 15px; }
        .no-results h4 { font-size: 1.2rem; color: var(--dark); margin-bottom: 8px; }
        .no-results p { color: var(--text-grey); font-size: 0.9rem; }
        .dest-card.filter-hidden { display: none !important; }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes clickPop { 0% { transform: scale(1); } 50% { transform: scale(0.92); } 100% { transform: scale(1); } }
        .btn-clicked { animation: clickPop 0.25s ease; }

        .destinations { background: var(--white); }
        .dest-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px; }
        .dest-card {
            background: var(--white); border-radius: 20px; overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 5px 20px rgba(0,0,0,0.06); position: relative;
            display: flex; flex-direction: column;
        }
        .dest-card:hover { transform: translateY(-12px); box-shadow: 0 20px 50px rgba(0,0,0,0.12); }
        .dest-img { height: 200px; position: relative; overflow: hidden; flex-shrink: 0; }
        .dest-img img { transition: transform 0.6s ease; }
        .dest-card:hover .dest-img img { transform: scale(1.12); }
        .dest-img-placeholder {
            width: 100%; height: 100%; display: flex; flex-direction: column;
            align-items: center; justify-content: center; gap: 10px;
            background: linear-gradient(135deg, #e0eef2, #c8dce3); color: var(--primary-blue);
        }
        .dest-img-placeholder i { font-size: 2.5rem; opacity: 0.5; }
        .dest-img-placeholder span { font-size: 0.75rem; font-weight: 500; opacity: 0.6; text-align: center; padding: 0 15px; }
        .dest-img .price-tag {
            position: absolute; top: 15px; right: 15px; background: var(--primary-blue);
            color: var(--white); padding: 5px 15px; border-radius: 20px; font-size: 0.85rem; font-weight: 600;
        }
        .dest-info { padding: 22px; display: flex; flex-direction: column; flex: 1; }
        .dest-info h3 { font-size: 1.15rem; font-weight: 700; margin-bottom: 8px; }
        .dest-info p { color: var(--text-grey); font-size: 0.88rem; line-height: 1.6; margin-bottom: 15px; flex: 1; }
        .dest-footer { display: flex; justify-content: space-between; align-items: center; padding-top: 12px; border-top: 1px solid #f0f0f0; margin-top: auto; }
        .dest-footer .dest-type { font-size: 0.8rem; color: var(--text-grey); display: flex; align-items: center; gap: 6px; }
        .dest-footer .dest-type i { color: var(--primary-blue); font-size: 0.85rem; }
        .dest-footer .dest-btn {
            background: none; border: none; color: var(--primary-blue); font-size: 0.85rem; font-weight: 600;
            cursor: pointer; font-family: 'Poppins', sans-serif; padding: 0; transition: all 0.3s;
        }
        .dest-footer .dest-btn:hover { color: var(--sunset); }
        .price-text { font-weight: 700; color: var(--sunset); }

        .packages { background: var(--light-blue); }
        .pack-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px; }
        .pack-card {
            background: var(--white); border-radius: 20px; overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 5px 20px rgba(0,0,0,0.06); position: relative;
            display: flex; flex-direction: column;
        }
        .pack-card:hover { transform: translateY(-12px); box-shadow: 0 20px 50px rgba(0,0,0,0.12); }
        .pack-card-img {
            height: 200px; position: relative; overflow: hidden; flex-shrink: 0;
        }
        .pack-card-img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease; }
        .pack-card:hover .pack-card-img img { transform: scale(1.12); }
        .pack-card-body { padding: 22px; display: flex; flex-direction: column; flex: 1; }
        .pack-card-body h4 { font-size: 1.15rem; font-weight: 700; margin-bottom: 8px; }
        .pack-card-body p { color: var(--text-grey); font-size: 0.88rem; line-height: 1.6; margin-bottom: 15px; flex: 1; }
        .pack-card-footer {
            display: flex; justify-content: space-between; align-items: center; padding-top: 12px;
            border-top: 1px solid #f0f0f0; margin-top: auto;
        }
        .pack-card-footer .dest-type { font-size: 0.8rem; color: var(--text-grey); display: flex; align-items: center; gap: 6px; }
        .pack-card-footer .dest-type i { color: var(--primary-blue); font-size: 0.85rem; }
        .pack-card-footer .dest-btn {
            background: none; border: none; color: var(--primary-blue); font-size: 0.85rem; font-weight: 600;
            cursor: pointer; font-family: 'Poppins', sans-serif; padding: 0; transition: all 0.3s;
        }
        .pack-card-footer .dest-btn:hover { color: var(--sunset); }
        .pack-card-footer .pack-wishlist {
            width: 40px; height: 40px; border-radius: 12px; background: #f8f9fa;
            display: flex; align-items: center; justify-content: center;
            transition: all 0.3s; cursor: pointer; border: none; font-size: 1rem;
        }
        .pack-card-footer .pack-wishlist:hover { background: #fef0ec; color: var(--sunset); }
        .pack-popular {
            position: absolute; top: 15px; right: 15px; z-index: 3;
            background: #fff; color: var(--sunset); padding: 4px 12px; border-radius: 12px;
            font-size: 0.7rem; font-weight: 700; box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .dest-card.filter-hidden, .pack-card.filter-hidden { display: none !important; }
        .highlight-card {
            animation: highlightPulse 0.6s ease 3;
            border-color: var(--sunset) !important;
            box-shadow: 0 0 0 3px rgba(245, 130, 86, 0.3), 0 8px 25px rgba(0,0,0,0.15) !important;
        }
        @keyframes highlightPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.02); }
        }

        .modal-overlay {
            position: fixed; inset: 0; background: rgba(0,0,0,0.6);
            z-index: 9999; display: none; align-items: center; justify-content: center;
            padding: 20px; backdrop-filter: blur(4px);
        }
        .modal-overlay.show { display: flex; }
        .modal-box {
            background: #fff; border-radius: 20px; width: 100%; max-width: 520px;
            max-height: 90vh; overflow-y: auto; animation: fadeInUp 0.3s ease;
            box-shadow: 0 30px 80px rgba(0,0,0,0.3);
        }
        .modal-header {
            background: linear-gradient(135deg, #2b7a8c, #1e5e6e);
            color: #fff; padding: 25px 30px; border-radius: 20px 20px 0 0;
            display: flex; justify-content: space-between; align-items: center;
        }
        .modal-header h3 { font-size: 1.2rem; font-weight: 700; margin: 0; }
        .modal-header .modal-close {
            width: 36px; height: 36px; border-radius: 50%; background: rgba(255,255,255,0.15);
            border: none; color: #fff; font-size: 1.1rem; cursor: pointer; transition: 0.3s;
            display: flex; align-items: center; justify-content: center;
        }
        .modal-header .modal-close:hover { background: rgba(255,255,255,0.3); }
        .modal-body { padding: 30px; }
        .modal-body .form-group { margin-bottom: 18px; }
        .modal-body .form-group label {
            display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px; color: #1f2e35;
        }
        .modal-body .form-group input,
        .modal-body .form-group select,
        .modal-body .form-group textarea {
            width: 100%; padding: 11px 15px; border: 2px solid #e9ecef; border-radius: 10px;
            font-family: 'Poppins', sans-serif; font-size: 0.9rem; color: var(--dark);
            transition: 0.3s; outline: none;
        }
        .modal-body .form-group input:focus,
        .modal-body .form-group select:focus,
        .modal-body .form-group textarea:focus { border-color: #2b7a8c; box-shadow: 0 0 0 3px rgba(43,122,140,0.1); }
        .modal-body .form-group textarea { resize: vertical; min-height: 80px; }
        .modal-body .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
        .modal-body .btn-submit {
            width: 100%; padding: 14px; background: linear-gradient(135deg, #ff7e5f, #feb47b);
            border: none; border-radius: 12px; color: #fff; font-weight: 700; font-size: 1rem;
            font-family: 'Poppins', sans-serif; cursor: pointer; transition: 0.3s;
        }
        .modal-body .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(255,126,95,0.4); }
        .modal-body .btn-submit:disabled { opacity: 0.6; cursor: not-allowed; transform: none; }
        .modal-success {
            text-align: center; padding: 40px 20px;
        }
        .modal-success i { font-size: 3.5rem; color: #28a745; margin-bottom: 15px; }
        .modal-success h4 { font-size: 1.3rem; margin-bottom: 8px; }
        .modal-success p { color: var(--text-grey); font-size: 0.9rem; margin-bottom: 20px; }

        .dest-detail-modal .modal-box { max-width: 700px; }
        .dest-detail-modal .modal-header { background: linear-gradient(135deg, #2b7a8c, #1e5e6e); }
        .dest-detail-body { padding: 0; }
        .dest-detail-img { width: 100%; height: 350px; object-fit: cover; display: block; }
        .dest-detail-content { padding: 30px; }
        .dest-detail-content h2 { font-size: 1.6rem; font-weight: 700; margin-bottom: 8px; color: var(--dark); }
        .dest-detail-content .dest-detail-location {
            color: var(--text-grey); font-size: 0.95rem; margin-bottom: 15px;
        }
        .dest-detail-content .dest-detail-location i { color: var(--sunset); margin-right: 6px; }
        .dest-detail-content .dest-detail-price {
            font-size: 1.2rem; font-weight: 700; color: var(--sunset);
        }
        .dest-detail-content .dest-detail-desc {
            color: var(--text-grey); line-height: 1.8; font-size: 0.95rem; margin-bottom: 25px;
        }

        .about { background: var(--white); }
        .about-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 50px; align-items: center; }
        .about-img { border-radius: var(--card-radius); overflow: hidden; height: 350px; }
        .about-text h2 { text-align: left; }
        .about-text ul { margin-top: 15px; padding-left: 20px; list-style: disc; }
        .about-text ul li { margin-bottom: 10px; font-size: 0.92rem; color: var(--text-grey); line-height: 1.7; }
        .about-img img, .about-text .btn { cursor: pointer; transition: all 0.3s ease; }
        .about-img img:active { transform: scale(1.05); }
        .about-text .btn:active { transform: scale(0.95); box-shadow: 0 2px 8px rgba(0,0,0,0.2); }

        .testimonials { background: var(--light-blue); }
        .testim-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px; }
        .testim-card { background: var(--white); padding: 30px; border-radius: var(--card-radius); box-shadow: var(--shadow); }
        .testim-header { display: flex; align-items: center; gap: 15px; margin-bottom: 15px; }
        .avatar { width: 60px; height: 60px; border-radius: 50%; overflow: hidden; }
        .testim-header .stars { color: #f5b342; font-size: 0.9rem; }
        .testim-card p { color: var(--text-grey); font-style: italic; }

        .gallery { background: var(--white); }
        .gallery-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px; }
        .gallery-card {
            background: var(--white); border-radius: 20px; overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 5px 20px rgba(0,0,0,0.06); position: relative;
            display: flex; flex-direction: column;
        }
        .gallery-card:hover { transform: translateY(-12px); box-shadow: 0 20px 50px rgba(0,0,0,0.12); }
        .gallery-card-img { height: 200px; position: relative; overflow: hidden; flex-shrink: 0; }
        .gallery-card-img img { transition: transform 0.6s ease; width: 100%; height: 100%; object-fit: cover; }
        .gallery-card:hover .gallery-card-img img { transform: scale(1.12); }
        .gallery-card-body { padding: 22px; display: flex; flex-direction: column; flex: 1; }
        .gallery-card-body h4 { font-size: 1.15rem; font-weight: 700; margin-bottom: 8px; }
        .gallery-card-body p { color: var(--text-grey); font-size: 0.88rem; line-height: 1.6; flex: 1; }
        .gallery-card-footer { display: flex; justify-content: space-between; align-items: center; padding-top: 12px; border-top: 1px solid #f0f0f0; margin-top: auto; }
        .gallery-card-footer .gallery-type { font-size: 0.8rem; color: var(--text-grey); display: flex; align-items: center; gap: 6px; }
        .gallery-card-footer .gallery-type i { color: var(--primary-blue); font-size: 0.85rem; }
        .gallery-card-footer .gallery-btn {
            background: none; border: none; color: var(--primary-blue); font-size: 0.85rem; font-weight: 600;
            cursor: pointer; font-family: 'Poppins', sans-serif; padding: 0; transition: all 0.3s;
        }
        .gallery-card-footer .gallery-btn:hover { color: var(--sunset); }
        .gallery-img-placeholder {
            width: 100%; height: 100%; display: flex; flex-direction: column;
            align-items: center; justify-content: center; gap: 10px;
            background: linear-gradient(135deg, #e0eef2, #c8dce3); color: var(--primary-blue);
        }
        .gallery-img-placeholder i { font-size: 2.5rem; opacity: 0.5; }
        .gallery-img-placeholder span { font-size: 0.75rem; font-weight: 500; opacity: 0.6; text-align: center; padding: 0 15px; }

        .stats { background: var(--primary-blue); color: var(--white); padding: 60px 0; }
        .stats-grid { display: flex; justify-content: space-around; text-align: center; flex-wrap: wrap; gap: 20px; }
        .stat-item h3 { font-size: 2.5rem; font-weight: 700; }
        .stat-item p { font-size: 1rem; font-weight: 300; }

        footer { background: #0d1f24; color: #b6c9cf; padding: 60px 0 20px; }
        .footer-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 40px; margin-bottom: 40px; }
        .footer-col h4 { color: var(--white); margin-bottom: 20px; font-weight: 600; }
        .footer-col ul li { margin-bottom: 10px; }
        .footer-col ul li a:hover { color: var(--white); }
        .social-icons { display: flex; gap: 15px; }
        .social-icons a { background: rgba(255,255,255,0.1); width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: 0.3s; }
        .social-icons a:hover { background: var(--sunset); }
        .copyright { text-align: center; border-top: 1px solid #2a4047; padding-top: 20px; font-size: 0.9rem; }

        @media (max-width: 992px) {
            .hero h1 { font-size: 2.5rem; }
            .about-grid { grid-template-columns: 1fr; }
            .about-img { height: 250px; }
            .gallery-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 768px) {
            .nav-links { display: none; }
            .mobile-toggle { display: block; }
            .nav-links.active { display: flex; flex-direction: column; position: absolute; top: 100%; left: 0; width: 100%; background: var(--white); padding: 20px; box-shadow: 0 5px 10px rgba(0,0,0,0.1); gap: 15px; }
            .hero { height: 70vh; }
            .hero h1 { font-size: 2.5rem; }
            .about-grid { grid-template-columns: 1fr; }
            .about-img { height: 250px; }
            .gallery-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 768px) {
            .nav-links { display: none; }
            .mobile-toggle { display: block; }
            .nav-links.active { display: flex; flex-direction: column; position: absolute; top: 100%; left: 0; width: 100%; background: var(--white); padding: 20px; box-shadow: 0 5px 10px rgba(0,0,0,0.1); gap: 15px; }
            .hero { height: 70vh; }
            .hero h1 { font-size: 2rem; }
            .hero p { font-size: 1rem; }
            .hero-dots { bottom: 20px; }
            .hero-arrow { width: 40px; height: 40px; font-size: 1rem; }
            .hero-arrow-left { left: 10px; }
            .hero-arrow-right { right: 10px; }
            .search-form { flex-direction: column; }
            .form-group { width: 100%; min-width: auto; }
            .section-title { font-size: 1.8rem; }
            .stats-grid { flex-direction: column; }
            .stats-grid .stat-item { margin-bottom: 20px; }
        }
    </style>
</head>
<body>

    <nav id="navbar">
        <div class="nav-container">
            <a href="/" class="logo">Senja<span>Loka</span></a>
            <ul class="nav-links" id="navLinks">
                <li><a href="#home">Home</a></li>
                <li><a href="#destinations">Pantai</a></li>
                <li><a href="#packages">Wisata Alam</a></li>
                <li><a href="#gallery">Galeri</a></li>
                <li><a href="#testimonials">Ulasan</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#contact">Kontak</a></li>
                @guest
                    <li><a href="{{ route('login') }}" class="btn btn-outline-sunset" style="padding: 10px 25px;">Masuk</a></li>
                    <li><a href="{{ route('admin.login') }}" class="btn btn-sunset" style="padding: 10px 20px;">Login Admin</a></li>
                @endguest
                @auth
                    @if(Auth::user()->isAdmin())
                        <li><a href="{{ route('admin.dashboard') }}" class="btn btn-primary" style="padding: 10px 25px;"><i class="fas fa-home" style="margin-right: 8px;"></i> Dashboard</a></li>
                    @else
                        <li><a href="{{ route('profile') }}" class="btn btn-primary" style="padding: 10px 25px;"><i class="fas fa-user-circle me-1"></i> Profil</a></li>
                    @endif
                    <li>
                        <form method="POST" action="{{ route('logout') }}" style="display:inline;margin:0;">
                            @csrf
                            <button type="submit" class="btn btn-sunset" style="padding: 10px 25px;" onclick="this.classList.add('btn-clicked');setTimeout(()=>this.classList.remove('btn-clicked'),250)">
                                <i class="fas fa-sign-out-alt" style="margin-right: 8px;"></i> Keluar
                            </button>
                        </form>
                    </li>
                @endauth
            </ul>
            <div class="mobile-toggle" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <section class="hero" id="home">
        <div class="hero-slides" id="heroSlides">
            <div class="hero-slide active" style="background-image:url('https://images.unsplash.com/photo-1685432241219-beb208c6c27d?q=80&w=1920&auto=format&fit=crop');"></div>
            <div class="hero-slide" style="background-image:url('https://images.unsplash.com/photo-1612144637714-ff3130c956cf?q=80&w=1920&auto=format&fit=crop');"></div>
            <div class="hero-slide" style="background-image:url('https://images.unsplash.com/photo-1612144642286-600fb6f1bf9b?q=80&w=1920&auto=format&fit=crop');"></div>
            <div class="hero-slide" style="background-image:url('https://images.unsplash.com/photo-1644102586396-01144d49a237?q=80&w=1920&auto=format&fit=crop');"></div>
            <div class="hero-slide" style="background-image:url('https://images.unsplash.com/photo-1542007618896-0e56c92d5591?q=80&w=1920&auto=format&fit=crop');"></div>
        </div>
        <div class="hero-content">
            <h1>Eksplor Keindahan Lombok Tengah Bersama SenjaLoka</h1>
            <p>Nikmati pengalaman wisata terbaik dengan panorama pantai, bukit dan air terjun khas Lombok Tengah.</p>
            <div class="hero-buttons">
                <a href="javascript:void(0)" class="btn btn-sunset" onclick="showAllDestinasi()">Jelajahi Destinasi</a>
            </div>
        </div>
        <button class="hero-arrow hero-arrow-left" onclick="prevSlide()" aria-label="Sebelumnya"><i class="fas fa-chevron-left"></i></button>
        <button class="hero-arrow hero-arrow-right" onclick="nextSlide()" aria-label="Selanjutnya"><i class="fas fa-chevron-right"></i></button>
        <div class="hero-dots" id="heroDots"></div>
    </section>

    <section class="search-tour" id="search">
        <div class="container search-content">
            <div class="search-title">
                <i class="fas fa-search"></i> Cari Pengalaman Wisata Anda
            </div>
            <form class="search-form" id="searchForm" onsubmit="return false;">
                <div class="form-group">
                    <label>Kategori Wisata</label>
                    <div class="select-hidden">
                        <select id="filterCategory">
                            <option value="">Semua Kategori</option>
                            @php
                                $allCats = collect();
                                foreach ($destinations as $d) { $allCats->push($d->category); }
                                foreach ($bukitDestinations as $b) { $allCats->push($b->category); }
                                $uniqueCats = $allCats->unique()->sort()->values();
                            @endphp
                            @foreach ($uniqueCats as $cat)
                                <option value="{{ $cat }}">{{ ucfirst($cat) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="select-box" onclick="toggleSelect(this)" data-target="filterCategory">
                        <span class="select-text">Semua Kategori</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="select-dropdown" data-target="filterCategory">
                        <div class="opt selected" data-value="" onclick="pickSelect(this)">Semua Kategori</div>
                        @foreach ($uniqueCats as $cat)
                            <div class="opt" data-value="{{ $cat }}" onclick="pickSelect(this)">{{ ucfirst($cat) }}</div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label>Destinasi Lombok Tengah</label>
                    <div class="select-hidden">
                        <select id="filterLocation">
                            <option value="">Cari Destinasi</option>
                            @php
                                $allNames = collect();
                                foreach ($destinations as $d) { $allNames->push(['name' => $d->title, 'slug' => $d->slug]); }
                                foreach ($bukitDestinations as $b) { $allNames->push(['name' => $b->title, 'slug' => $b->slug]); }
                                $uniqueNames = $allNames->unique('name')->sortBy('name')->values();
                            @endphp
                            @foreach ($uniqueNames as $nm)
                                <option value="{{ $nm['name'] }}">{{ $nm['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="select-box" onclick="toggleSelect(this)" data-target="filterLocation">
                        <span class="select-text">Cari Destinasi</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="select-dropdown" data-target="filterLocation">
                        <div class="opt selected" data-value="" onclick="pickSelect(this)">Cari Destinasi</div>
                        @foreach ($uniqueNames as $nm)
                            <div class="opt" data-value="{{ $nm['name'] }}" onclick="pickSelect(this)">{{ $nm['name'] }}</div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label>Cari Nama</label>
                    <input type="text" id="filterSearch" placeholder="Ketik nama destinasi..." style="width:100%;padding:12px 15px;border-radius:8px;border:none;font-family:'Poppins',sans-serif;color:var(--dark);outline:none;" oninput="filterWisata()">
                </div>
                <button type="button" class="search-btn" onclick="cariWisata()"><i class="fas fa-search"></i> Cari Wisata</button>
                <button type="button" class="search-btn-reset" onclick="resetFilter()"><i class="fas fa-undo-alt"></i> Reset</button>
            </form>
        </div>
    </section>

    <section class="destinations section-padding" id="destinations">
        <div class="container">
            <h2 class="section-title">Rekomendasi Destinasi Pantai Terpopuler di Lombok Tengah</h2>
            <p class="section-subtitle">Jelajahi keindahan pantai yang eksotis dan terpopuler di Lombok Tengah</p>
            <div class="search-info">
                <div class="result-count" id="resultCount">Menampilkan <strong>{{ $destinations->count() }}</strong> destinasi pantai terpopuler</div>
                <button class="clear-filter" id="clearFilter" onclick="resetFilter()"><i class="fas fa-times"></i> Hapus Filter</button>
            </div>
            <div class="dest-grid" id="destGrid">
                @forelse ($destinations as $d)
                    <div class="dest-card" data-category="{{ $d->category }}" data-location="{{ $d->slug ?? '' }}" data-address="{{ $d->location }}" data-name="{{ $d->title }}"
                         data-description="{{ $d->description }}" data-image="{{ $d->image }}"
                         data-rating="{{ $d->rating }}" data-reviews="{{ $d->reviews }}">
                        <div class="dest-img">
                            @if ($d->image)
                                @if (filter_var($d->image, FILTER_VALIDATE_URL))
                                    <img src="{{ $d->image }}" alt="{{ $d->title }}">
                                @else
                                    <img src="{{ asset('storage/' . $d->image) }}" alt="{{ $d->title }}">
                                @endif
                            @else
                                <div class="dest-img-placeholder">
                                    <i class="fas fa-image"></i>
                                    <span>{{ $d->title }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="dest-info">
                            <h3>{{ $d->title }}</h3>
                            <p>{{ Str::limit($d->description, 120) }}</p>
                            <div class="dest-footer">
                                <span class="dest-type"><i class="fas fa-umbrella-beach"></i> Pantai</span>
                                <button type="button" class="dest-btn" onclick="openDestDetail(this.parentElement.parentElement.parentElement)">Lihat Detail →</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-5">Belum ada destinasi.</div>
                @endforelse

            <div class="no-results" id="noResultsDest">
                <i class="fas fa-search"></i>
                <h4>Destinasi tidak ditemukan</h4>
                <p>Coba ubah kata kunci atau pilih kategori yang berbeda.</p>
            </div>
        </div>
    </section>

    <section class="packages section-padding" id="packages">
        <div class="container">
            <h2 class="section-title">Rekomendasi Destinasi wisata alam Bukit dan Air Terjun Terpopuler di Lombok Tengah</h2>
            <p class="section-subtitle">Jelajahi keindahan bukit hijau, savana eksotis, dan air terjun alami yang memukau di Lombok Tengah.</p>
            <div class="search-info" style="margin-top:30px;">
                <div class="result-count" id="packCount">Menampilkan <strong>{{ $bukitDestinations->count() }}</strong> destinasi</div>
            </div>
            <div class="pack-grid" id="packGrid">
                @forelse ($bukitDestinations as $b)
                     <div class="pack-card" data-category="{{ $b->category }}" data-name="{{ $b->title }}"
                         data-description="{{ $b->description ?? '' }}"
                         data-image="@if(filter_var($b->image, FILTER_VALIDATE_URL)){{ $b->image }}@else{{ asset('storage/' . $b->image) }}@endif"
                         data-location="{{ $b->slug ?? $b->location }}"
                         data-address="{{ $b->location }}"
                         data-rating="{{ $b->rating }}" data-reviews="{{ $b->reviews }}">
                        <div class="pack-card-img">
                            @if (filter_var($b->image, FILTER_VALIDATE_URL))
                                <img src="{{ $b->image }}" alt="{{ $b->title }}">
                            @else
                                <img src="{{ asset('storage/' . $b->image) }}" alt="{{ $b->title }}">
                            @endif
                        </div>
                        <div class="pack-card-body">
                            <h4>{{ $b->title }}</h4>
                            <p>{{ Str::limit($b->description, 120) }}</p>
                            <div class="pack-card-footer">
                                <span class="dest-type"><i class="fas {{ $b->category === 'air terjun' ? 'fa-water' : 'fa-mountain' }}"></i> {{ ucfirst($b->category) }}</span>
                                <button type="button" class="dest-btn" onclick="openDestDetail(this.parentElement.parentElement.parentElement)">Lihat Detail →</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-5">Belum ada destinasi bukit dan air terjun.</div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="about section-padding" id="about">
        <div class="container">
            <div class="about-grid">
                <div class="about-img">
                    <img src="https://tse3.mm.bing.net/th/id/OIP.hAHKpE-H9xNDBvj4N1z0rgHaEK?pid=Api&h=220&P=0" alt="Pemandangan Pantai">
                </div>
                <div class="about-text">
                    <h2 class="section-title" style="text-align: left;">Tentang SenjaLoka</h2>
                    <p style="color: var(--text-grey);">SenjaLoka hadir sebagai mitra perjalanan terpercaya Anda di Lombok Tengah. Kami berfokus menghadirkan pengalaman wisata lokal yang autentik, menggabungkan keindahan alam pantai, bukit, dan air terjun.</p>
                    <ul>
                        <li>Informasi destinasi wisata lengkap untuk membantu Anda menjelajahi keindahan Lombok Tengah..</li>
                        <li>Layanan terbaik dan informasi terpercaya untuk pengalaman liburan yang lebih nyaman.</li>
                        <li>Spot air terjun dan bukit indah yang jauh dari keramaian.</li>
                        <li>Komitmen memberikan informasi wisata berkualitas dengan kepuasan pengunjung sebagai prioritas utama.</li>
                    </ul>
                    <a href="#" class="btn btn-primary" style="margin-top:35px;font-weight:700;">Cerita Lebih Lanjut</a>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials section-padding" id="testimonials">
        <div class="container">
            <h2 class="section-title">Apa Kata Wisatawan?</h2>
            <p class="section-subtitle">Ulasan tulus dari mereka yang telah merasakan pengalaman bersama SenjaLoka.</p>
            <div class="testim-grid">
                @forelse ($testimonials as $t)
                    <div class="testim-card">
                        <div class="testim-header">
                            <div class="avatar">
                                @if ($t->avatar)
                                    @if (filter_var($t->avatar, FILTER_VALIDATE_URL))
                                        <img src="{{ $t->avatar }}" alt="{{ $t->name }}">
                                    @else
                                        <img src="{{ asset('storage/' . $t->avatar) }}" alt="{{ $t->name }}">
                                    @endif
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($t->name) }}&background=2b7a8c&color=fff" alt="{{ $t->name }}">
                                @endif
                            </div>
                            <div>
                                <h4>{{ $t->name }}</h4>
                                <div class="stars">
                                    @for ($s = 1; $s <= 5; $s++)
                                        <i class="fas fa-star{{ $s <= $t->rating ? '' : '-o' }}" style="color:{{ $s <= $t->rating ? '#f5b342' : '#ddd' }}"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <p>&ldquo;{{ $t->content }}&rdquo;</p>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-5">Belum ada testimoni.</div>
                @endforelse
            </div>

            <div style="text-align:center;margin-top:45px;">
                <button type="button" class="btn btn-sunset" onclick="openTestimonialForm()" style="padding:14px 40px;font-size:1rem;">
                    <i class="fas fa-pen me-2"></i> Tulis Ulasan
                </button>
            </div>
        </div>
    </section>

    <section class="gallery section-padding" id="gallery">
        <div class="container">
            <h2 class="section-title">Galeri Wisata Lombok Tengah</h2>
            <p class="section-subtitle">Tangkap setiap momen indah perjalanan Anda bersama SenjaLoka.</p>
            <div class="gallery-grid" id="galleryGrid">
                @forelse ($galleries as $g)
                    <div class="gallery-card" data-image="{{ $g->image }}" data-caption="{{ $g->caption ?? 'Galeri SenjaLoka' }}">
                        <div class="gallery-card-img">
                            @if ($g->image)
                                @if (filter_var($g->image, FILTER_VALIDATE_URL))
                                    <img src="{{ $g->image }}" alt="{{ $g->caption ?? 'Galeri SenjaLoka' }}">
                                @else
                                    <img src="{{ asset('storage/' . $g->image) }}" alt="{{ $g->caption ?? 'Galeri SenjaLoka' }}">
                                @endif
                            @else
                                <div class="gallery-img-placeholder">
                                    <i class="fas fa-image"></i>
                                    <span>{{ $g->caption ?? 'Galeri' }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="gallery-card-body">
                            <h4>{{ $g->caption ?? 'Tanpa Keterangan' }}</h4>
                            <p>{{ $g->created_at ? $g->created_at->format('d M Y') : '' }}</p>
                            <div class="gallery-card-footer">
                                <span class="gallery-type"><i class="fas fa-image"></i> Galeri</span>
                                <button type="button" class="gallery-btn" onclick="openGalleryModal(this)">Lihat Foto →</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-5">Belum ada foto galeri.</div>
                @endforelse
        </div>
    </section>

    <section class="stats">
        <div class="container stats-grid">
            <div class="stat-item">
                <h3>5K+</h3>
                <p>Wisatawan Berbahagia</p>
            </div>
            <div class="stat-item">
                <h3>50+</h3>
                <p>Destinasi Lokal</p>
            </div>
            <div class="stat-item">
                <h3>4.9</h3>
                <p>Rating Kepuasan</p>
            </div>
            <div class="stat-item">
                <h3>5</h3>
                <p>Tahun Pengalaman</p>
            </div>
        </div>
    </section>

    <footer id="contact">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <div class="logo" style="color: white; margin-bottom: 15px;">Senja<span>Loka</span></div>
                    <p>Menghadirkan pengalaman wisata premium & autentik di Lombok Tengah. Setiap perjalanan adalah cerita.</p>
                    <div class="social-icons" style="margin-top: 20px;">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Kontak Kami</h4>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> Jl. Raya Kuta, Kec. Pujut, Lombok Tengah, NTB</li>
                        <li><i class="fas fa-phone"></i> +62 370 1234 567</li>
                        <li><i class="fas fa-envelope"></i> info@senjaloka.com</li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#destinations">Pantai</a></li>
                        @auth
                            @if(Auth::user()->isAdmin())
                                <li><a href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
                            @else
                                <li><a href="{{ route('profile') }}">Profil Saya</a></li>
                            @endif
                        @endauth
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                &copy; 2026 SenjaLoka - Travel Lombok Tengah. All Rights Reserved.
            </div>
        </div>
    </footer>



    <div class="modal-overlay" id="testimonialModal">
        <div class="modal-box">
            <div class="modal-header" style="background:linear-gradient(135deg, #ff7e5f, #feb47b);">
                <h3><i class="fas fa-pen me-2"></i> Tulis Ulasan</h3>
                <button class="modal-close" onclick="closeTestimonialForm()"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body" id="testiFormBody">
                <form id="testimonialForm" onsubmit="submitTestimonial(event)">
                    <div class="form-group" style="text-align:center;margin-bottom:20px;">
                        <label style="font-weight:600;margin-bottom:10px;display:block;">Rating Pengalaman Anda</label>
                        <div class="testi-star-rating" style="display:flex;gap:8px;justify-content:center;font-size:2.2rem;direction:rtl;">
                            <input type="radio" name="rating" value="5" class="star-radio" id="tr5" checked><label for="tr5" class="star-label" style="cursor:pointer;color:#ddd;transition:0.2s;">&#9733;</label>
                            <input type="radio" name="rating" value="4" class="star-radio" id="tr4"><label for="tr4" class="star-label" style="cursor:pointer;color:#ddd;transition:0.2s;">&#9733;</label>
                            <input type="radio" name="rating" value="3" class="star-radio" id="tr3"><label for="tr3" class="star-label" style="cursor:pointer;color:#ddd;transition:0.2s;">&#9733;</label>
                            <input type="radio" name="rating" value="2" class="star-radio" id="tr2"><label for="tr2" class="star-label" style="cursor:pointer;color:#ddd;transition:0.2s;">&#9733;</label>
                            <input type="radio" name="rating" value="1" class="star-radio" id="tr1"><label for="tr1" class="star-label" style="cursor:pointer;color:#ddd;transition:0.2s;">&#9733;</label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Nama Lengkap <span style="color:var(--sunset)">*</span></label>
                            <input type="text" name="name" required placeholder="Masukkan nama Anda">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="role" style="width:100%;padding:12px 16px;border:1px solid #e0e0e0;border-radius:12px;background:#fafafa;font-size:0.95rem;">
                                <option value="Wisatawan">Wisatawan</option>
                                <option value="Pengunjung">Pengunjung</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Ulasan Anda <span style="color:var(--sunset)">*</span></label>
                        <textarea name="content" rows="4" required placeholder="Ceritakan pengalaman Anda bersama SenjaLoka..."></textarea>
                    </div>

                    <button type="submit" class="btn-submit" id="testiSubmitBtn" style="background:linear-gradient(135deg, #ff7e5f, #feb47b);">
                        <i class="fas fa-paper-plane me-2"></i> Kirim Ulasan
                    </button>
                </form>
            </div>
            <div class="modal-body" id="testiSuccessBody" style="display:none;">
                <div class="modal-success">
                    <i class="fas fa-check-circle"></i>
                    <h4>Ulasan Terkirim!</h4>
                    <p>Terima kasih! Ulasan Anda akan tampil setelah diverifikasi oleh admin.</p>
                    <button class="btn btn-primary" onclick="closeTestimonialForm()" style="border-radius:12px;padding:12px 30px;">
                        <i class="fas fa-thumbs-up me-2"></i> Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-overlay dest-detail-modal" id="destDetailModal">
        <div class="modal-box">
            <div class="modal-header">
                <h3><i class="fas fa-info-circle me-2"></i> Detail Destinasi</h3>
                <button class="modal-close" onclick="closeDestDetail()"><i class="fas fa-times"></i></button>
            </div>
            <div class="dest-detail-body" id="destDetailBody">
                <img class="dest-detail-img" id="destDetailImg" src="" alt="">
                <div class="dest-detail-content">
                    <h2 id="destDetailTitle"></h2>
                    <div class="dest-detail-location"><i class="fas fa-map-marker-alt"></i> <a id="destDetailLocation" href="#" target="_blank" style="color:var(--primary-blue);text-decoration:underline;" title="Buka di Google Maps"></a></div>
                    <p class="dest-detail-desc" id="destDetailDesc"></p>

                    <button class="btn btn-primary" onclick="closeDestDetail()" style="border-radius:12px;padding:12px 30px;">
                        <i class="fas fa-times me-2"></i> Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-overlay" id="galleryModal">
        <div class="modal-box" style="max-width:700px;">
            <div class="modal-header" style="background:linear-gradient(135deg,#2b7a8c,#1e5e6e);">
                <h3><i class="fas fa-image me-2"></i> <span id="galleryModalTitle">Galeri Foto</span></h3>
                <button class="modal-close" onclick="closeGalleryModal()"><i class="fas fa-times"></i></button>
            </div>
            <div class="dest-detail-body">
                <img class="dest-detail-img" id="galleryModalImg" src="" alt="" style="height:450px;">
                <div class="dest-detail-content">
                    <p class="dest-detail-desc" id="galleryModalCaption" style="text-align:center;font-size:1rem;"></p>
                    <div style="text-align:center;">
                        <button class="btn btn-primary" onclick="closeGalleryModal()" style="border-radius:12px;padding:12px 30px;">
                            <i class="fas fa-times me-2"></i> Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-overlay" id="loginModal">
        <div class="modal-box">
            <div class="modal-header" style="background:linear-gradient(135deg,#ff7e5f,#feb47b);">
                <h3><i class="fas fa-sign-in-alt me-2"></i> Masuk</h3>
                <button class="modal-close" onclick="closeLoginModal()"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body" id="loginFormBody">
                <form id="loginForm" onsubmit="submitLogin(event)">
                    <div class="form-group">
                        <label>Email <span style="color:var(--sunset)">*</span></label>
                        <input type="email" name="email" required placeholder="Masukkan email Anda">
                    </div>
                    <div class="form-group">
                        <label>Password <span style="color:var(--sunset)">*</span></label>
                        <input type="password" name="password" required placeholder="Masukkan password">
                    </div>
                    <div class="form-group" style="display:flex;align-items:center;gap:8px;">
                        <input type="checkbox" name="remember" id="loginRemember" style="width:auto;">
                        <label for="loginRemember" style="margin:0;font-size:0.85rem;">Ingat saya</label>
                    </div>
                    <button type="submit" class="btn-submit" id="loginSubmitBtn" style="background:linear-gradient(135deg,#2b7a8c,#1e5e6e);">
                        <i class="fas fa-sign-in-alt me-2"></i> Masuk
                    </button>
                </form>
                <p style="text-align:center;margin-top:20px;font-size:0.9rem;color:var(--text-grey);">
                    Belum punya akun? <a href="{{ route('register') }}" style="color:var(--primary-blue);font-weight:600;">Daftar di sini sebagai user</a>
                </p>

            </div>
            <div class="modal-body" id="loginSuccessBody" style="display:none;">
                <div class="modal-success">
                    <i class="fas fa-check-circle"></i>
                    <h4>Berhasil Masuk!</h4>
                    <p>Selamat datang kembali. Memuat halaman...</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openGalleryModal(btn) {
            const card = btn.closest('.gallery-card');
            let image = card.dataset.image || '';
            const caption = card.dataset.caption || 'Galeri SenjaLoka';

            if (image && !image.startsWith('http') && !image.startsWith('data:')) {
                image = '{{ asset('storage/') }}/' + image;
            }
            if (!image) {
                image = 'https://images.unsplash.com/photo-1594744803329-e58b31de8bf5?q=80&w=600&auto=format&fit=crop';
            }

            document.getElementById('galleryModalImg').src = image;
            document.getElementById('galleryModalTitle').textContent = caption;
            document.getElementById('galleryModalCaption').textContent = caption;
            document.getElementById('galleryModal').classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeGalleryModal() {
            document.getElementById('galleryModal').classList.remove('show');
            document.body.style.overflow = '';
        }

        document.getElementById('galleryModal').addEventListener('click', function(e) {
            if (e.target === this) closeGalleryModal();
        });

        function openDestDetail(el) {
            const title = el.dataset.name || 'Destinasi';
            const desc = el.dataset.description || 'Tidak ada deskripsi.';
            let image = el.dataset.image || '';
            const location = el.dataset.location || 'Lombok Tengah';
            const address = el.dataset.address || location;

            if (image && !image.startsWith('http') && !image.startsWith('data:')) {
                image = '{{ asset('storage/') }}/' + image;
            }
            if (!image) {
                image = 'https://images.unsplash.com/photo-1594744803329-e58b31de8bf5?q=80&w=600&auto=format&fit=crop';
            }

            document.getElementById('destDetailImg').src = image;
            document.getElementById('destDetailTitle').textContent = title;
            const locationEl = document.getElementById('destDetailLocation');
            locationEl.textContent = address;
            locationEl.href = 'https://www.google.com/maps/search/?api=1&query=' + encodeURIComponent(address + ', Lombok Tengah, NTB');
            document.getElementById('destDetailDesc').innerHTML = desc.replace(/\n/g, '<br>');

            document.getElementById('destDetailModal').classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeDestDetail() {
            document.getElementById('destDetailModal').classList.remove('show');
            document.body.style.overflow = '';
        }

        document.getElementById('destDetailModal').addEventListener('click', function(e) {
            if (e.target === this) closeDestDetail();
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') { closeDestDetail(); closeTestimonialForm(); closeGalleryModal(); }
        });

        var heroSlides = document.querySelectorAll('.hero-slide');
        var heroDots = document.getElementById('heroDots');
        var currentSlide = 0;

        for (var i = 0; i < heroSlides.length; i++) {
            var dot = document.createElement('span');
            dot.className = 'hero-dot' + (i === 0 ? ' active' : '');
            dot.dataset.index = i;
            dot.addEventListener('click', function() {
                goToSlide(parseInt(this.dataset.index));
            });
            heroDots.appendChild(dot);
        }

        function goToSlide(index) {
            heroSlides.forEach(function(s, i) {
                s.classList.toggle('active', i === index);
            });
            document.querySelectorAll('.hero-dot').forEach(function(d, i) {
                d.classList.toggle('active', i === index);
            });
            currentSlide = index;
        }

        function nextSlide() {
            goToSlide((currentSlide + 1) % heroSlides.length);
        }

        function prevSlide() {
            goToSlide((currentSlide - 1 + heroSlides.length) % heroSlides.length);
        }

        goToSlide(0);

        function toggleMenu() {
            document.getElementById('navLinks').classList.toggle('active');
        }
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                document.getElementById('navLinks').classList.remove('active');
            });
        });
        window.onscroll = function() {
            const navbar = document.getElementById('navbar');
            navbar.style.boxShadow = window.scrollY > 20
                ? '0 4px 15px rgba(0,0,0,0.1)'
                : '0 2px 10px rgba(0,0,0,0.05)';
        };

        function toggleSelect(el) {
            const target = el.dataset.target;
            document.querySelectorAll('.select-dropdown.show').forEach(function(d) {
                if (d.dataset.target !== target) d.classList.remove('show');
            });
            document.querySelectorAll('.select-box.open').forEach(function(b) {
                if (b.dataset.target !== target) b.classList.remove('open');
            });
            const dd = document.querySelector('.select-dropdown[data-target="' + target + '"]');
            dd.classList.toggle('show');
            el.classList.toggle('open');
        }

        function pickSelect(el) {
            const dd = el.closest('.select-dropdown');
            const target = dd.dataset.target;
            const box = document.querySelector('.select-box[data-target="' + target + '"]');
            dd.querySelectorAll('.opt').forEach(function(o) { o.classList.remove('selected'); });
            el.classList.add('selected');
            box.querySelector('.select-text').textContent = el.textContent;
            dd.classList.remove('show');
            box.classList.remove('open');
            document.getElementById(target).value = el.dataset.value;
            filterWisata();
        }

        document.addEventListener('click', function(e) {
            if (!e.target.closest('.form-group')) {
                document.querySelectorAll('.select-dropdown.show').forEach(function(d) { d.classList.remove('show'); });
                document.querySelectorAll('.select-box.open').forEach(function(b) { b.classList.remove('open'); });
            }
        });

        function filterWisata() {
            const cat = document.getElementById('filterCategory').value.toLowerCase();
            const loc = document.getElementById('filterLocation').value.toLowerCase();
            const search = document.getElementById('filterSearch').value.toLowerCase().trim();

            const showClear = cat || loc || search;
            document.getElementById('clearFilter').classList.toggle('show', showClear);

            filterCards('destGrid', 'noResultsDest', '.dest-card', cat, loc, search);
            filterCards('packGrid', null, '.pack-card', cat, loc, search);
            updatePackCount();

        }

        function filterCards(gridId, noResultId, selector, cat, loc, search) {
            const grid = document.getElementById(gridId);
            const cards = grid.querySelectorAll(selector);
            let visible = 0;

            cards.forEach(card => {
                const cardCat = (card.dataset.category || '').toLowerCase();
                const cardName = (card.dataset.name || '').toLowerCase();

                const matchCat = !cat || cardCat === cat;
                const matchLoc = !loc || cardName === loc;
                const matchSearch = !search || cardName.includes(search);

                if (matchCat && matchLoc && matchSearch) {
                    card.classList.remove('filter-hidden');
                    card.style.animation = 'none';
                    card.offsetHeight;
                    card.style.animation = 'fadeInUp 0.4s ease forwards';
                    visible++;
                } else {
                    card.classList.add('filter-hidden');
                }
            });

            const total = cards.length;
            const countEl = gridId === 'destGrid'
                ? document.getElementById('resultCount')
                : document.getElementById('packCount');
            if (countEl) {
                countEl.innerHTML = visible === 0
                    ? 'Tidak ada hasil'
                    : 'Menampilkan <strong>' + visible + '</strong> dari <strong>' + total + '</strong>';
            }

            if (noResultId) {
                document.getElementById(noResultId).style.display = visible === 0 ? 'block' : 'none';
            }
        }

        function cariWisata() {
            filterWisata();
            var first = document.querySelector('.dest-card:not(.filter-hidden), .pack-card:not(.filter-hidden)');
            if (first) {
                var top = first.getBoundingClientRect().top + window.pageYOffset - 100;
                window.scrollTo({ top: top, behavior: 'smooth' });
                first.classList.add('highlight-card');
                setTimeout(function() { first.classList.remove('highlight-card'); }, 2500);
            }
        }

        function resetFilter() {
            document.getElementById('filterCategory').value = '';
            document.getElementById('filterLocation').value = '';
            document.getElementById('filterSearch').value = '';
            document.getElementById('clearFilter').classList.remove('show');
            document.querySelector('.select-box[data-target="filterCategory"] .select-text').textContent = 'Semua Kategori';
            document.querySelector('.select-box[data-target="filterLocation"] .select-text').textContent = 'Cari Destinasi';
            document.querySelectorAll('.select-dropdown .opt').forEach(function(o) {
                o.classList.toggle('selected', o.dataset.value === '');
            });
            filterWisata();
        }

        function showAllDestinasi() {
            resetFilter();

            var target1 = document.getElementById('destinations');
            var target2 = document.getElementById('packages');

            if (target1) {
                var top1 = target1.getBoundingClientRect().top + window.pageYOffset - 80;
                window.scrollTo({ top: top1, behavior: 'smooth' });
            }

            if (target2) {
                setTimeout(function() {
                    var top2 = target2.getBoundingClientRect().top + window.pageYOffset - 80;
                    window.scrollTo({ top: top2, behavior: 'smooth' });
                }, 3000);
            }
        }

        function updatePackCount() {
            const grid = document.getElementById('packGrid');
            const total = grid.querySelectorAll('.pack-card').length;
            const visible = grid.querySelectorAll('.pack-card:not(.filter-hidden)').length;
            const el = document.getElementById('packCount');
            if (el) {
                el.innerHTML = visible === 0
                    ? 'Tidak ada hasil'
                    : 'Menampilkan <strong>' + visible + '</strong> dari <strong>' + total + '</strong>';
            }
        }

        function openTestimonialForm() {
            document.getElementById('testimonialForm').reset();
            document.getElementById('testiFormBody').style.display = 'block';
            document.getElementById('testiSuccessBody').style.display = 'none';
            document.getElementById('testiSubmitBtn').disabled = false;
            document.getElementById('testiSubmitBtn').innerHTML = '<i class="fas fa-paper-plane me-2"></i> Kirim Ulasan';
            document.getElementById('testimonialModal').classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeTestimonialForm() {
            document.getElementById('testimonialModal').classList.remove('show');
            document.body.style.overflow = '';
        }

        document.getElementById('testimonialModal').addEventListener('click', function(e) {
            if (e.target === this) closeTestimonialForm();
        });

        document.querySelectorAll('.testi-star-rating .star-label').forEach(function(label) {
            label.addEventListener('mouseenter', function() {
                var els = document.querySelectorAll('.testi-star-rating .star-label');
                var hovered = false;
                els.forEach(function(el) {
                    if (el === this) hovered = true;
                    el.style.color = hovered ? '#f5b342' : '#ddd';
                }.bind(this));
            });
            label.addEventListener('mouseleave', function() {
                document.querySelectorAll('.testi-star-rating .star-label').forEach(function(el) {
                    el.style.color = '#ddd';
                });
                var checked = document.querySelector('.testi-star-rating .star-radio:checked');
                if (checked) {
                    var val = parseInt(checked.value);
                    document.querySelectorAll('.testi-star-rating .star-label').forEach(function(el, idx) {
                        if (idx < val) el.style.color = '#f5b342';
                    });
                }
            });
        });

        async function submitTestimonial(event) {
            event.preventDefault();
            const form = document.getElementById('testimonialForm');
            const btn = document.getElementById('testiSubmitBtn');
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Mengirim...';

            const data = new FormData(form);

            try {
                const res = await fetch('{{ route("testimonial.store") }}', {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' },
                    body: data
                });
                const json = await res.json();
                if (json.success) {
                    document.getElementById('testiFormBody').style.display = 'none';
                    document.getElementById('testiSuccessBody').style.display = 'block';
                } else {
                    alert('Gagal: ' + (json.message || 'Terjadi kesalahan'));
                    btn.disabled = false;
                    btn.innerHTML = '<i class="fas fa-paper-plane me-2"></i> Kirim Ulasan';
                }
            } catch (err) {
                alert('Terjadi kesalahan. Silakan coba lagi.');
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-paper-plane me-2"></i> Kirim Ulasan';
            }
        }



        function openLoginModal() {
            document.getElementById('loginForm').reset();
            document.getElementById('loginFormBody').style.display = 'block';
            document.getElementById('loginSuccessBody').style.display = 'none';
            document.getElementById('loginSubmitBtn').disabled = false;
            document.getElementById('loginSubmitBtn').innerHTML = '<i class="fas fa-sign-in-alt me-2"></i> Masuk';
            document.getElementById('loginModal').classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeLoginModal() {
            document.getElementById('loginModal').classList.remove('show');
            document.body.style.overflow = '';
        }

        document.getElementById('loginModal').addEventListener('click', function(e) {
            if (e.target === this) closeLoginModal();
        });

        async function submitLogin(event) {
            event.preventDefault();
            const form = document.getElementById('loginForm');
            const btn = document.getElementById('loginSubmitBtn');
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Memproses...';

            const data = new FormData(form);

            try {
                const res = await fetch('{{ route("login.post") }}', {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' },
                    body: data
                });
                const json = await res.json();
                if (json.success) {
                    document.getElementById('loginFormBody').style.display = 'none';
                    document.getElementById('loginSuccessBody').style.display = 'block';
                    setTimeout(function() { window.location.href = json.redirect || '/'; }, 1000);
                } else {
                    alert(json.message || 'Email atau password salah.');
                    btn.disabled = false;
                    btn.innerHTML = '<i class="fas fa-sign-in-alt me-2"></i> Masuk';
                }
            } catch (err) {
                alert('Terjadi kesalahan. Silakan coba lagi.');
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-sign-in-alt me-2"></i> Masuk';
            }
        }

        if (new URLSearchParams(window.location.search).get('open') === 'login') {
            history.replaceState(null, '', window.location.pathname);
            openLoginModal();
        }
    </script>
</body>
</html>