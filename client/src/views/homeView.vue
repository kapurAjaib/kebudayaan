<script lang="ts" setup>
import { onMounted, onUnmounted, ref } from 'vue';
import { navMainStore } from '@/stores/navMain';
const navMain = navMainStore();

navMain.active = 'home';
const navHeight = ref(0);
let abortController: AbortController;
const resize = () => {
    if (window.innerWidth <= 576) {
        navHeight.value = navMain.height;
        return;
    }
    navHeight.value = 0;
}
onMounted(() => {
    resize();
    abortController = new AbortController();
    window.addEventListener('resize', resize, {
        signal: abortController.signal
    });
});
onUnmounted(() => {
    abortController.abort();
});

</script>
<template>
    <section class="hero" :style="{ 'padding-top': `${navHeight}px` }">
        <div class="sm:h-screen">
            <div class="text-center">
                <h1 class="hero-title m-0 p-0">Mari jelajahi budaya Kita</h1>
                <div class="brand-name">
                    Explore <span class="brand-name-dark-blue">Budaya</span>
                </div>
                <RouterLink to="/culture">
                    <button class="action-btn mt-3">
                        Jelajahi sekarang
                    </button>
                </RouterLink>
            </div>
        </div>
    </section>

    <section class="gallery container mt-8">
        <div class="gallery-grid">
            <div class="img-zoom-on-hover shadow-2">
                <img src="@/assets//image/home/grid-img1.jpg" class="gallery-img " alt="Grid image kecak" />
            </div>
            <div class="img-zoom-on-hover shadow-2">
                <img src="@/assets//image/home/grid-img2.jpg" class="gallery-img" alt="Grid image people" />
            </div>
            <div class="img-zoom-on-hover hidden sm:block shadow-2">
                <img src="@/assets//image/home/grid-img3.jpg" class="gallery-img" alt="Grid image statue" />
            </div>
            <div class="img-zoom-on-hover shadow-2">
                <img src="@/assets//image/home/grid-img4.jpg" class="gallery-img" alt="Grid image tradition" />
            </div>
            <div class="img-zoom-on-hover shadow-2">
                <img src="@/assets//image/home/grid-img5.jpg" class="gallery-img" alt="Grid image people" />
            </div>
        </div>
    </section>

    <section class="about container mt-6">
        <h1 class="text-2xl mb-2">Explore budaya</h1>
        <div class="grid">
            <div class="sm:col-6 col-12 pr-0">
                <div>
                    <p>
                        Explore Budaya adalah wadah bagi kebudayaan-kebudayaan yang ada hampir di seluruh
                        wilayah
                        atau
                        Pulau
                        yang ada di Indonesia mulai dari sabang sampai merauke.
                    </p>
                    <p class="mb-0">
                        Explore Budaya mencakup hampir seluruh wilayah yang ada di Indonesia.
                        Seperti
                        Provinsi :</p>
                </div>
                <TypeWriter :data="['Kalimantan selatan', 'Bali', 'Jawa Timur']" v-slot="data">
                    <div class="about-typewriter text-2xl font-semibold uppercase">
                        {{ data.text }}
                    </div>
                </TypeWriter>
            </div>
            <div class="sm:col-6 col-12 px-4 flex align-items-center justify-content-center">
                <div>
                    <img src="@/assets/image/home/map.png" class="w-full" alt="Map" />
                </div>
            </div>
        </div>
    </section>

    <section class="culture-list mt-6">
        <div class="container py-4">
            <h1 class="text-2xl mb-2">Kebudayaan</h1>
            <div class="grid">
                <div class="col-12 sm:col-6 md:col-4">
                    <div class="culture-list-item py-4 px-3">
                        <div>
                            <img src="https://trigger.id/wp-content/uploads/2022/08/Karapan_Sapi.jpg" class="w-full" />
                        </div>
                        <div>
                            <h2 class="text-xl mb-0 mt-2">Karapan Sapi</h2>
                            <div class="max-line-3">
                                Karapan sapi adalah salah satu upacara adat yang dilakukan masyarakat Madura secara
                                turun-temurun.

                                Upacara ini dilakukan dalam bentuk perlombaan pacuan sapi yang dilakukan pada sebuah
                                pesta rakyat yang dilakukan secara turun-temurun.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 sm:col-6 md:col-4">
                    <div class="culture-list-item py-4 px-3">
                        <div>
                            <img src="https://thephrase.s3.ap-southeast-1.amazonaws.com/2023/05/Kasada_Umat_Hindu-scaled.webp"
                                class="w-full" />
                        </div>
                        <div>
                            <h2 class="text-xl mb-0 mt-2">Kasada</h2>
                            <div class="max-line-3">
                                Upacara Kasada yang dilakukan setiap tahunnya juga termasuk contoh kebudayaan Indonesia
                                yang selalu dilestarikan.

                                Upacara yang dilakukan setiap tanggal 14 Kasada kalender tradisional Hindu Tengger
                                adalah janji Suku Tengger kepada Bromo.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 sm:col-6 md:col-4">
                    <div class="culture-list-item py-4 px-3">
                        <div>
                            <img src="@/assets/image/home/grid-img1.jpg" class="w-full" />
                        </div>
                        <div>
                            <h2 class="text-xl mb-0 mt-2">Tari Kecak</h2>
                            <div class="max-line-3">
                                Tari Kecak adalah pertunjukan drama tari khas Bali yang umumnya mengangkat kisah
                                Ramayana. Tarian ini ditarikan oleh puluhan penari laki-laki yang duduk secara
                                melingkar.

                                Mereka menyerukan "cak cak cak" sambil mengangkat kedua lengan. Pada satu segmen, mereka
                                menirukan adegan saat barisan kera membantu Rama dalam pertempuran melawan Rahwana yang
                                menculik Dewi Sita.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 sm:col-6 md:col-4">
                    <div class="culture-list-item py-4 px-3">
                        <div>
                            <img src="https://pdbifiles.nos.jkt-1.neo.id/files/2020/06/13/widraaudina1_Info-terkait-dengan-Upacara-Tanam-Sasi-yang-ada-di-Papua_1592029248.jpg"
                                class="w-full" />
                        </div>
                        <div>
                            <h2 class="text-xl mb-0 mt-2">Tanam Sasi</h2>
                            <div class="max-line-3">
                                Tanam sasi adalah upacara adat untuk mempengirangi kematian di Merauke. Sasi yang
                                digunakan pada upacara ini adalah sejenis kayu yang akan ditanam ketika kematian sudah
                                mencapai 40 hari dan dicabut setelah 1000 hari.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 sm:col-6 md:col-4">
                    <div class="culture-list-item py-4 px-3">
                        <div>
                            <img src="https://indonesiakaya.com/wp-content/uploads/2020/10/Festival_Tabuik_1200.jpg"
                                class="w-full" />
                        </div>
                        <div>
                            <h2 class="text-xl mb-0 mt-2">Tabuik</h2>
                            <div class="max-line-3">
                                Kota Pariaman juga memiliki tradisi tahunan yang selalu dilakukan setiap tanggal 10
                                Muharram. Tabuik atau tabut yang berarti peti kayu ini mengisahkan tentang peti katu
                                yang berisi jenazah cucu Nabi diterbangkan oleh buraq, sehingga masyarakat Pariaman
                                meniru bentuk buroq.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 sm:col-6 md:col-4">
                    <div class="culture-list-item py-4 px-3">
                        <div>
                            <img src="https://awsimages.detik.net.id/community/media/visual/2023/01/08/makepung-di-sirkuit-tuwed-jembrana-foto-dok-bupati-jembrana-cup.jpeg?w=1200"
                                class="w-full" />
                        </div>
                        <div>
                            <h2 class="text-xl mb-0 mt-2">Makepung</h2>
                            <div class="max-line-3">
                                Makepung adalah bagian dari contoh kebudayaan Indonesia yang dilakukan di Bali. Makepung
                                yang berupa balapan kerbau ini pada dasarnya adalah permainan petani berupa membajak
                                sawah dan menjadi tradisi khusus untuk peringatan perayaan tertentu.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="flex justify-content-center mt-4">
                <button class="btn-see-another btn-blue">
                    <RouterLink to="/culture">Lihat Lainnya</RouterLink>
                </button>
            </div>
        </div>
    </section>
    <section class="event-list pb-5">
        <div class="container py-4">
            <h1 class="text-2xl mb-2">Acara</h1>
            <div class="grid">
                <div class="col-12 sm:col-6 md:col-4">
                    <div class="event-list-item py-4 px-3">
                        <div>
                            <img src="https://sman20kabupatentangerang.sch.id/media_library/posts/large/393ba7d708fd154dc4bc51e581a2582e.jpg"
                                class="w-full" />
                        </div>
                        <div>
                            <h2 class="text-xl mb-0 mt-2">Festival Erau</h2>
                            <div class="max-line-3">
                                Festival adat dari Kesultanan Kutai Kartanegara yang menampilkan ritual sakral,
                                tari-tarian tradisional, dan lomba perahu naga.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 sm:col-6 md:col-4">
                    <div class="event-list-item py-4 px-3">
                        <div>
                            <img src="https://www.pesonaindo.com/wp-content/uploads/2016/04/Waisak-borobudur.jpg"
                                class="w-full" />
                        </div>
                        <div>
                            <h2 class="text-xl mb-0 mt-2">Festival Malam 1000 Lampion Waisak</h2>
                            <div class="max-line-3">
                                Festival yang dilakukan saat perayaan Waisak dengan menerbangkan ribuan lampion di
                                sekitar Candi Borobudur, sebagai simbol harapan dan doa.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 sm:col-6 md:col-4">
                    <div class="event-list-item py-4 px-3">
                        <div>
                            <img src="https://statik.tempo.co/data/2021/06/29/id_1031279/1031279_720.jpg"
                                class="w-full" />
                        </div>
                        <div>
                            <h2 class="text-xl mb-0 mt-2">Festival Teluk Jailolo</h2>
                            <div class="max-line-3"> Festival ini menampilkan seni budaya dari berbagai suku di Maluku
                                Utara seperti tari-tarian, musik tradisional, dan pameran kuliner.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 sm:col-6 md:col-4">
                    <div class="event-list-item py-4 px-3">
                        <div>
                            <img src="https://asset.kompas.com/crops/9tV81Ig1Fpub8RWUu56-CnUh8ZQ=/0x0:780x520/750x500/data/photo/2019/07/29/5d3f08e4a92e4.jpg"
                                class="w-full" />
                        </div>
                        <div>
                            <h2 class="text-xl mb-0 mt-2">Dieng Culture Festival</h2>
                            <div class="max-line-3">Acara ini menampilkan ritual pemotongan rambut gimbal anak-anak
                                Dieng, dengan berbagai pertunjukan budaya, karnaval, serta penerbangan lampion.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 sm:col-6 md:col-4">
                    <div class="event-list-item py-4 px-3">
                        <div>
                            <img src="https://statik.tempo.co/data/2019/09/28/id_876287/876287_720.jpg"
                                class="w-full" />
                        </div>
                        <div>
                            <h2 class="text-xl mb-0 mt-2">Festival Tanjung Lesung</h2>
                            <div class="max-line-3">Acara budaya dan seni yang menampilkan pertunjukan musik, tari, dan
                                kuliner khas Banten.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 sm:col-6 md:col-4">
                    <div class="event-list-item py-4 px-3">
                        <div>
                            <img src="https://malangstrudel.com/wp-content/uploads/2017/09/Kudalumping_590x300.jpg"
                                class="w-full" />
                        </div>
                        <div>
                            <h2 class="text-xl mb-0 mt-2">Festival Kuda Lumping</h2>
                            <div class="max-line-3">Acara seni budaya yang menampilkan pertunjukan tari Kuda Lumping,
                                yang merupakan seni tradisional Jawa.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-content-center mt-4">
                <button class="btn-blue">
                    <RouterLink to="/event">Lihat Lainnya</RouterLink>
                </button>
            </div>
        </div>
    </section>
    <section class="action mt-6 mb-6">
        <div class="container text-center">
            <h1 class="text-lg text-blue mb-1 font-medium">Explore budaya</h1>
            <h2 class="text-3xl mt-0 mb-1">Mari jelajahi budaya kita</h2>
            <div class="action-content">
                Setiap daerah mempunyai keunikan budayanya masing masing. Mari tambah wawasanmu dengan bergabung ke
                explore budaya
            </div>
            <div class="text-center mt-4">
                <RouterLink to="/culture" class="link-blue font-semibold uppercase text-lg">Jelajahi Budaya</RouterLink>
            </div>
        </div>
    </section>
</template>
<style scoped>
.bg-white {
    background-color: white;
}

.hero-title {
    text-transform: uppercase;
    color: white;
    font-weight: 600;
    font-size: clamp(1rem, 2vw + 0.5rem, 1.5rem);
}

.hero>div {
    padding: 80px 20px;
    overflow: hidden;
    background: rgba(0, 0, 0, 0.8) url('@/assets/image/home/nyepi.png');
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    background-repeat: no-repeat;
}

.brand-name {
    color: #00A3FF;
    font-weight: 600;
    text-transform: uppercase;
    font-size: clamp(2rem, 5vw + 0.8rem, 4.3rem);
}

.brand-name-dark-blue {
    color: #113CD1;
}

.action-btn {
    background-color: #1e42c5;
    padding: 1em 2em;
    font-size: clamp(0.85rem, 0.3rem + 1vw, 1rem);
    text-align: center;
    text-transform: uppercase;
    font-family: poppins, sans-serif;
    transition: 0.5s;
    background-size: 200% auto;
    border: none;
    color: white;
    margin: auto;
    border-radius: 10px;
    font-weight: 600;
    display: block;
}

.action-btn:hover {
    background-color: #4169fb;
    color: #dfd4d4;
    text-decoration: none;
}

.gallery-grid {
    display: grid;
    gap: 10px;
    grid-template-columns: repeat(11, 1fr);
    grid-template-areas: "img1 img1 img1 img1 img2 img2 img2 img3 img3 img3 img3"
        "img4 img4  img4  img5 img5 img5 img5 img3 img3 img3 img3";
}

.gallery-grid>div:nth-child(1) {
    grid-area: img1;
}

.gallery-grid>div:nth-child(2) {
    grid-area: img2;

}

.gallery-grid>div:nth-child(3) {
    grid-area: img3;

}

.gallery-grid>div:nth-child(4) {
    grid-area: img4;

}

.gallery-grid>div:nth-child(5) {
    grid-area: img5;
    filter: brightness(90%);
}

.gallery-img {
    object-fit: cover;

    width: 100%;
    border-radius: 4px;
    height: 100%;
}


.about-typewriter {
    overflow: hidden;
    white-space: nowrap;
    will-change: width;
    color: #00A3FF;
}

.culture-list,
.event-list {
    background: url('@/assets/image/home/bg.png');
}

.culture-list-item,
.event-list-item {
    transition: all 600ms;
    border-radius: 4px;
}

.culture-list-item img,
.event-list-item img {
    border-radius: 8px;
}

.culture-list-item:hover,
.event-list-item:hover {
    background-color: rgb(255, 255, 255);
    box-shadow: 0px 1px 8px rgba(0, 0, 0, 0.08), 0px 3px 4px rgba(0, 0, 0, 0.1), 0px 1px 4px -1px rgba(0, 0, 0, 0.1);
}

.btn-blue {
    border: 0;
    font-weight: 600;
    background-color: #00A3FF;
    color: white;
    padding: 10px 30px;
    border-radius: 8px;
    transition: background-color 500ms;
}

.btn-blue:hover {
    background-color: #0f419e;
}

.action-content {
    margin: auto;
    max-width: 500px;
}

.link-blue {
    color: #00A3FF;
}

.link-blue:hover {
    text-decoration: underline;
}

@media screen and (max-width: 576px) {


    .gallery-grid {
        grid-template-columns: repeat(12, 1fr);
        grid-template-areas:
            "img1 img1 img1 img1 img1 img1 img2 img2 img2 img2 img2 img2"
            "img4 img4  img4  img4 img4 img4 img5 img5 img5 img5 img5 img5";
    }
}
</style>