<x-layout>

    
    
    <section>
        <div class="container my-4">
            <div class="d-flex align-items-center border p-3 rounded">
                <!-- Profile Image -->
                <div class="me-3">
                    <img src="/img2/user.png" alt="Profile" class="rounded-circle" style="width: 80px; height: 80px;">
                </div>
        
                <!-- Profile Details -->
                <div>
                    <h4 class="mb-1">{{ Auth::user()->name }}</h4>
                    <p class="mb-1 text-muted">{{ Auth::user()->email }}</p>
                    <p class="mb-0 text-muted">{{ Auth::user()->phone }}</p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container my-4">
            <p class="lead">OPEN TRIP YANG SUDAH DIIKUTI</p>
            <hr>

            
            <div class="d-flex align-items-center border p-3 mb-3 rounded">
                <div class="rounded">
                    <img src="/img/putri.jpg" style="width: 200px;" class="rounded">
                </div>
                <div class="ms-3">
                    <div>
                        <h5>Kemah di Gunung Putri</h5>
                        <hr>
                        <p class="m-0">Jl. Gunung Putri No.184, Jayagiri, Kec. Lembang, Kabupaten Bandung Barat, Jawa Barat 40391</p>
                        <small class="text-muted">Jam Buka: 01.00-19.50</small><br>
                        <small class="text-muted">Harga: Rp3.000 - Rp7.500</small>
                        <p class="mt-1">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum corporis id similique autem deserunt. Quis ratione, aliquam officia dolorum nesciunt, sit libero voluptates enim ipsum voluptate quo, nihil odio eos?</p>
                    </div>
                        
                </div>
            </div>

            <div class="d-flex align-items-center border p-3 rounded">
                <div class="rounded">
                    <img src="/img/putri.jpg" style="width: 200px;" class="rounded">
                </div>
                <div class="ms-3">
                    <div>
                        <h5>Kemah di Gunung Putri</h5>
                        <hr>
                        <p class="m-0">Jl. Gunung Putri No.184, Jayagiri, Kec. Lembang, Kabupaten Bandung Barat, Jawa Barat 40391</p>
                        <small class="text-muted">Jam Buka: 01.00-19.50</small><br>
                        <small class="text-muted">Harga: Rp3.000 - Rp7.500</small>
                        <p class="mt-1">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum corporis id similique autem deserunt. Quis ratione, aliquam officia dolorum nesciunt, sit libero voluptates enim ipsum voluptate quo, nihil odio eos?</p>
                    </div>
                        
                </div>
            </div>
           
            

        </div>
        
    </section>


</x-layout>