@extends('layouts.app')

@section('content')

<style>
  .legalitas-section {
    font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
    max-width: 960px;
    margin: 0 auto;
    padding: 64px 24px;
    color: #1c1c1a;
  }

  .legalitas-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    color: #0f6e56;
    background: #e1f5ee;
    padding: 6px 14px;
    border-radius: 999px;
    margin-bottom: 20px;
  }

  .legalitas-title {
    font-size: 32px;
    font-weight: 700;
    line-height: 1.25;
    margin: 0 0 12px;
    color: #161614;
  }

  .legalitas-subtitle {
    font-size: 16px;
    line-height: 1.7;
    color: #5f5e5a;
    max-width: 620px;
    margin: 0 0 40px;
  }

  .legalitas-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 16px;
    margin-bottom: 40px;
  }

  .legalitas-card {
    background: #ffffff;
    border: 1px solid #e7e5dd;
    border-radius: 12px;
    padding: 24px;
  }

  .legalitas-card-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    background: #e1f5ee;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 16px;
    font-size: 18px;
    color: #0f6e56;
    font-weight: 700;
  }

  .legalitas-card-label {
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 0.04em;
    text-transform: uppercase;
    color: #888780;
    margin: 0 0 6px;
  }

  .legalitas-card-value {
    font-size: 16px;
    font-weight: 600;
    color: #1c1c1a;
    margin: 0 0 4px;
    word-break: break-word;
  }

  .legalitas-card-sub {
    font-size: 13px;
    color: #5f5e5a;
    margin: 0;
    line-height: 1.5;
  }

  .legalitas-table-wrap {
    background: #ffffff;
    border: 1px solid #e7e5dd;
    border-radius: 12px;
    overflow: hidden;
    margin-bottom: 24px;
  }

  .legalitas-table-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 16px;
    padding: 16px 24px;
    border-bottom: 1px solid #f1efe8;
  }

  .legalitas-table-row:last-child {
    border-bottom: none;
  }

  .legalitas-table-key {
    font-size: 14px;
    color: #5f5e5a;
    flex-shrink: 0;
  }

  .legalitas-table-val {
    font-size: 14px;
    font-weight: 600;
    color: #1c1c1a;
    text-align: right;
  }

  .legalitas-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 12px;
    font-weight: 600;
    background: #eaf3de;
    color: #27500a;
    padding: 4px 10px;
    border-radius: 999px;
  }

  .legalitas-footnote {
    font-size: 13px;
    color: #888780;
    line-height: 1.6;
    border-top: 1px solid #e7e5dd;
    padding-top: 20px;
    margin-top: 8px;
  }

  .legalitas-footnote a {
    color: #0f6e56;
    text-decoration: none;
    font-weight: 600;
  }

  .legalitas-footnote a:hover {
    text-decoration: underline;
  }

  @media (max-width: 560px) {
    .legalitas-title { font-size: 26px; }
    .legalitas-table-row { flex-direction: column; align-items: flex-start; gap: 4px; }
    .legalitas-table-val { text-align: left; }
  }
</style>

<section class="legalitas-section">

  <span class="legalitas-eyebrow">✓ Badan usaha terdaftar resmi</span>
  <h2 class="legalitas-title">Legalitas perusahaan</h2>
  <p class="legalitas-subtitle">
    PT Omah Sinau Semar terdaftar resmi sebagai badan hukum Perseroan Perorangan
    di Indonesia dan memiliki perizinan berusaha melalui sistem OSS (Online Single
    Submission). Status legalitas dapat diverifikasi langsung di sistem resmi pemerintah.
  </p>

  <div class="legalitas-grid">

    <div class="legalitas-card">
      <div class="legalitas-card-icon">AHU</div>
      <p class="legalitas-card-label">Sertifikat pendirian</p>
      <p class="legalitas-card-value">AHU-009094.AH.01.30.Tahun 2025</p>
      <p class="legalitas-card-sub">Diterbitkan Kementerian Hukum RI, 23 Februari 2025</p>
    </div>

    <div class="legalitas-card">
      <div class="legalitas-card-icon">NIB</div>
      <p class="legalitas-card-label">Nomor induk berusaha</p>
      <p class="legalitas-card-value">3001260032236</p>
      <p class="legalitas-card-sub">Terdaftar di sistem OSS, 30 Januari 2026</p>
    </div>

    <div class="legalitas-card">
      <div class="legalitas-card-icon">85</div>
      <p class="legalitas-card-label">Bidang usaha (KBLI 85500)</p>
      <p class="legalitas-card-value">Penunjang pendidikan</p>
      <p class="legalitas-card-sub">Konsultasi, bimbingan, dan evaluasi pendidikan</p>
    </div>

  </div>

  <div class="legalitas-table-wrap">
    <div class="legalitas-table-row">
      <span class="legalitas-table-key">Nama perseroan</span>
      <span class="legalitas-table-val">PT Omah Sinau Semar</span>
    </div>
    <div class="legalitas-table-row">
      <span class="legalitas-table-key">Berkedudukan di</span>
      <span class="legalitas-table-val">Genteng, Banyuwangi, Jawa Timur</span>
    </div>
    <div class="legalitas-table-row">
      <span class="legalitas-table-key">Skala usaha</span>
      <span class="legalitas-table-val">Usaha mikro</span>
    </div>
    <div class="legalitas-table-row">
      <span class="legalitas-table-key">Status perizinan</span>
      <span class="legalitas-badge">Terbit &amp; aktif</span>
    </div>
  </div>

  <p class="legalitas-footnote">
    Dokumen legalitas (Sertifikat Pendirian AHU dan NIB) diterbitkan resmi oleh
    Kementerian Hukum RI dan sistem OSS Republik Indonesia. Status pendaftaran
    dapat diverifikasi mandiri melalui
    <a href="https://ahu.go.id" target="_blank" rel="noopener">ahu.go.id</a>
    dan
    <a href="https://oss.go.id" target="_blank" rel="noopener">oss.go.id</a>.
  </p>

</section>

@endsection
