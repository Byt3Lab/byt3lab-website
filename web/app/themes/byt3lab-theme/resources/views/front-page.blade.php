@extends('layouts.app')

@section('content')
  <section class="o-hero-section position-relative overflow-hidden d-flex align-items-center justify-content-center text-center">
    <div class="container py-5">
      <h1 class="text-white fw-bold">Byt3lab — test d'intégration</h1>
      <p class="text-white-50">Si tu vois cette page avec le bon styling Bootstrap + tes overrides, c'est gagné.</p>
      <a href="#contact" class="a-button a-button--primary">Test bouton</a>
    </div>
  </section>

  <section class="o-counter-section py-5">
    <div class="container">
      <div class="row g-4 justify-content-center">
        <div class="col-sm-6 col-lg-3">
          <div class="m-counter-card p-4 text-center">
            <span class="a-counter-value text-primary-custom fw-bold d-block mb-2" data-target="991">0</span>
            <span class="a-counter-label text-uppercase text-white">Applications</span>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
