<script setup lang="ts">
import { navMainStore } from '@/stores/navMain';
const navState = navMainStore();

navState.active = 'event';
</script>
<template>
    <section class="min-h-screen" :style="{
        paddingTop: `${navState.height}px`
    }">

        <div class="container-full pb-5">
            <h1 class="text-4xl">Acara Budaya</h1>
            <div class="grid">
                <div class="col-12 lg:col-6 p-3">
                    <RouterLink to="/event/1">
                        <div class="shadow-3 px-3 py-3 card-item border-round-md grid">
                            <div class="sm:col-5 col-12">
                                <div>
                                    <img src="https://awsimages.detik.net.id/community/media/visual/2022/07/03/ilustrasi-jadwal-pesta-kesenian-bali-pkb-selasa-5-juli-2022_169.jpeg?w=600&q=90"
                                        class="w-full border-round-md" alt="hero image" />
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="font-semibold text-lg  mb-3">Pesta Kesenian Bali</div>

                                <div class="font-medium flex gap-2">
                                    <i class="bi bi-geo-alt"></i>
                                    <div>Jl. Nusa Indah No.1, Panjer, Denpasar Selatan, Kota Denpasar, Bali 80236</div>
                                </div>
                                <div class="flex gap-2 mt-1">
                                    <i class="bi bi-ticket-perforated"></i>
                                    <div>20.000</div>
                                </div>
                                <div class="flex gap-2 mt-1">
                                    <i class="bi bi-newspaper"></i>
                                    <div class="max-line-2 mt-1">
                                        Pesta Kesenian Bali adalah parade atau festival kesenian tahunan yang
                                        diprakarsai oleh Pemerintah Provinsi Bali, serta dijadikan sebagai wadah
                                        aktivitas dan kreativitas para seniman dalam upaya mendukung program pemerintah
                                        dalam hal penggalian, pelestarian, dan pengembangan nilai-nilai seni budaya
                                        Bali.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </RouterLink>
                </div>
                <div class="col-12 lg:col-6 p-3">
                    <RouterLink to="/event/1">
                        <div class="shadow-3 px-3 py-3 card-item border-round-md grid">
                            <div class="sm:col-5 col-12">
                                <div>
                                    <img src="https://www.pesonaindo.com/wp-content/uploads/2016/04/Festival-Lembah-Baliem-Wamena-Papua-2-1.jpg"
                                        class="w-full border-round-md" alt="hero image" />
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="font-semibold text-lg  mb-3">Festival Lembah Baliem</div>

                                <div class="font-medium flex gap-2">
                                    <i class="bi bi-geo-alt"></i>
                                    <div>Lembah Baliem, Kabupaten Jayawijaya, Papua.</div>
                                </div>
                                <div class="flex gap-2 mt-1">
                                    <i class="bi bi-ticket-perforated"></i>
                                    <div>Free</div>
                                </div>
                                <div class="flex gap-2 mt-1">
                                    <i class="bi bi-newspaper"></i>
                                    <div class="max-line-2 mt-1">
                                        Fesival Budaya Lembah Baliem ini adalah sebuah acara untuk melestarikan budaya
                                        masyarakat Lembah Baliem yang umumnya digelar di wilayah kabupaten Jayawijaya
                                        pada bulan Agustus dengan cara memperkenalkan budaya yang ada di Papua.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </RouterLink>
                </div>
                <div class="col-12 lg:col-6 p-3">
                    <RouterLink to="/event/1">
                        <div class="shadow-3 px-3 py-3 card-item border-round-md grid">
                            <div class="sm:col-5 col-12">
                                <div>
                                    <img src="https://pariwisata.jogjakota.go.id/resources/img/article/20190219131655.jpg"
                                        class="w-full border-round-md" alt="hero image" />
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="font-semibold text-lg  mb-3">Sekaten Yogyakarta</div>

                                <div class="font-medium flex gap-2">
                                    <i class="bi bi-geo-alt"></i>
                                    <div>Alun-Alun Utara, Kraton Yogyakarta, Yogyakarta.</div>
                                </div>
                                <div class="flex gap-2 mt-1">
                                    <i class="bi bi-ticket-perforated"></i>
                                    <div>10.000</div>
                                </div>
                                <div class="flex gap-2 mt-1">
                                    <i class="bi bi-newspaper"></i>
                                    <div class="max-line-2 mt-1">
                                        Sekaten adalah festival tradisional yang digelar setiap tahun untuk memperingati
                                        Maulid Nabi Muhammad SAW. Acara ini menampilkan musik gamelan dan berbagai
                                        pameran seni budaya.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </RouterLink>
                </div>
                <div class="col-12 lg:col-6 p-3">
                    <RouterLink to="/event/1">
                        <div class="shadow-3 px-3 py-3 card-item border-round-md grid">
                            <div class="sm:col-5 col-12">
                                <div>
                                    <img src="https://indonesiakaya.com/wp-content/uploads/2020/10/Festival_Tabuik_1200.jpg"
                                        class="w-full border-round-md" alt="hero image" />
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="font-semibold text-lg  mb-3">Festival Tabuik</div>

                                <div class="font-medium flex gap-2">
                                    <i class="bi bi-geo-alt"></i>
                                    <div>Pantai Gandoriah, Pariaman, Sumatera Barat.</div>
                                </div>
                                <div class="flex gap-2 mt-1">
                                    <i class="bi bi-ticket-perforated"></i>
                                    <div>15.000</div>
                                </div>
                                <div class="flex gap-2 mt-1">
                                    <i class="bi bi-newspaper"></i>
                                    <div class="max-line-2 mt-1">
                                        Tabuik adalah festival budaya di Pariaman untuk memperingati peristiwa Asyura,
                                        yang menampilkan prosesi pengusungan Tabuik ke pantai dan dilepaskan ke laut.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </RouterLink>
                </div>
                <div class="col-12 lg:col-6 p-3">
                    <RouterLink to="/event/1">
                        <div class="shadow-3 px-3 py-3 card-item border-round-md grid">
                            <div class="sm:col-5 col-12">
                                <div>
                                    <img src="https://asset.kompas.com/crops/UW8B5IkZndFqSgLtosi7Lf3GKo4=/102x0:702x400/750x500/data/photo/2017/09/16/647235463.jpg"
                                        class="w-full border-round-md" alt="hero image" />
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="font-semibold text-lg  mb-3">Festival Keraton Nusantara</div>

                                <div class="font-medium flex gap-2">
                                    <i class="bi bi-geo-alt"></i>
                                    <div>Keraton Surakarta, Solo, Jawa Tengah.</div>
                                </div>
                                <div class="flex gap-2 mt-1">
                                    <i class="bi bi-ticket-perforated"></i>
                                    <div>20.000</div>
                                </div>
                                <div class="flex gap-2 mt-1">
                                    <i class="bi bi-newspaper"></i>
                                    <div class="max-line-2 mt-1">
                                        Festival ini merupakan ajang berkumpulnya keraton-keraton dari seluruh Indonesia
                                        untuk menampilkan budaya dan tradisi masing-masing, termasuk upacara adat,
                                        tari-tarian, dan pameran.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </RouterLink>
                </div>
                <div class="col-12 lg:col-6 p-3">
                    <RouterLink to="/event/1">
                        <div class="shadow-3 px-3 py-3 card-item border-round-md grid">
                            <div class="sm:col-5 col-12">
                                <div>
                                    <img src="https://cdn.idntimes.com/content-images/post/20190828/pasted-image-0-bc14a54e137d441877938bde27c36edc_600x400.png" class="w-full border-round-md"
                                        alt="hero image" />
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="font-semibold text-lg  mb-3">Festival Danau Toba</div>

                                <div class="font-medium flex gap-2">
                                    <i class="bi bi-geo-alt"></i>
                                    <div>Kawasan Danau Toba, Sumatera Utara.</div>
                                </div>
                                <div class="flex gap-2 mt-1">
                                    <i class="bi bi-ticket-perforated"></i>
                                    <div>20.000</div>
                                </div>
                                <div class="flex gap-2 mt-1">
                                    <i class="bi bi-newspaper"></i>
                                    <div class="max-line-2 mt-1">
                                        Acara tahunan ini diadakan untuk merayakan budaya Batak dan menampilkan lomba kapal tradisional, tari-tarian Batak, dan pameran budaya.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </RouterLink>
                </div>


            </div>
        </div>
    </section>
</template>
<style scoped>
.card-item {}

.card-item:hover {
    background-color: rgba(251, 251, 251, 0.925);
}
</style>