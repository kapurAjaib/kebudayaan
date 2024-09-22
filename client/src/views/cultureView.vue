<script setup lang="ts">
import { navMainStore } from '@/stores/navMain';
const navState = navMainStore();

navState.active = 'culture';

</script>
<template>
    <section class="min-h-screen" :style="{
        paddingTop: `${navState.height}px`
    }">

        <div class="container-full pb-5">
            <h1 class="text-4xl">Jelajahi Budaya</h1>
            <div class="grid">
                <div class="col-12 lg:col-6 px-3">
                    <RouterLink to="/culture/1">
                        <div class="shadow-3 px-3 py-3 card-culture border-round-md grid">
                            <div class="sm:col-5 col-12">
                                <div>
                                    <img src="@/assets/image/home/grid-img1.jpg" class="w-full border-round-md"
                                        alt="hero image" />
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="font-semibold text-lg  mb-3">Tari kecak</div>
                                <div class="font-medium flex gap-2">
                                    <i class="bi bi-geo-alt"></i>
                                    <div>Bali</div>
                                </div>
                                <div class="flex gap-2 mt-2">
                                    <i class="bi bi-pencil"></i>
                                    <div class="font-medium">I Putu Sastrawan</div>
                                </div>
                                <div class="flex gap-2 mt-2">
                                    <i class="bi bi-newspaper"></i>
                                    <div class="max-line-2 mt-1">
                                        Tari Kecak adalah pertunjukan drama tari khas Bali yang umumnya mengangkat kisah
                                        Ramayana. Tarian ini ditarikan oleh puluhan penari laki-laki yang duduk secara
                                        melingkar.

                                        Mereka menyerukan "cak cak cak" sambil mengangkat kedua lengan. Pada satu
                                        segmen, mereka
                                        menirukan adegan saat barisan kera membantu Rama dalam pertempuran melawan
                                        Rahwana yang
                                        menculik Dewi Sita.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </RouterLink>
                </div>
                <div class="col-12 lg:col-6 px-3">
                    <RouterLink to="/culture/1">
                        <div class="shadow-3 px-3 py-3 card-culture border-round-md grid">
                            <div class="sm:col-5 col-12">
                                <div>
                                    <img src="https://img.antaranews.com/cache/1200x800/2024/07/09/1000313007.jpg"
                                        class="w-full border-round-md" alt="hero image" />
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="font-semibold text-lg  mb-3">Reog Ponorogo</div>
                                <div class="font-medium flex gap-2">
                                    <i class="bi bi-geo-alt"></i>
                                    <div>Jawa Timur</div>
                                </div>
                                <div class="flex gap-2 mt-2">
                                    <i class="bi bi-pencil"></i>
                                    <div class="font-medium">Akmal Fuad</div>
                                </div>
                                <div class="flex gap-2 mt-2">
                                    <i class="bi bi-newspaper"></i>
                                    <div class="max-line-2 mt-1">
                                        Reog Ponorogo merupakan salah satu tradisi masyarakat Ponorogo yang yang masih
                                        hidup dan bertujuan mempererat tali silaturahmi masyarakat Ponorogo. Kesenian
                                        yang mulanya bernama “Barongan”.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </RouterLink>
                </div>
                <div class="col-12 lg:col-6 px-3">
                    <RouterLink to="/culture/1">
                        <div class="shadow-3 px-3 py-3 card-culture border-round-md grid">
                            <div class="sm:col-5 col-12">
                                <div>
                                    <img src="https://piaagungbali.com/wp-content/uploads/2024/03/tradisi-pengerupukan.jpg"
                                        class="w-full border-round-md" alt="hero image" />
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="font-semibold text-lg  mb-3">Pengerupukan</div>
                                <div class="font-medium flex gap-2">
                                    <i class="bi bi-geo-alt"></i>
                                    <div>Bali</div>
                                </div>
                                <div class="flex gap-2 mt-2">
                                    <i class="bi bi-pencil"></i>
                                    <div class="font-medium">Made Anggara</div>
                                </div>
                                <div class="flex gap-2 mt-2">
                                    <i class="bi bi-newspaper"></i>
                                    <div class="max-line-2 mt-1">
                                        Pengerupukan adalah salah satu tahapan pelaksanaan Hari Suci Nyepi yang memiliki
                                        makna mengusir Bhuta Kala dari lingkungan rumah, pekarangan, dan lingkungan
                                        sekitar. Bhuta Kala adalah wujud manifestasi sifat buruk bagi umat hindu dan
                                        lingkungan sekitar.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </RouterLink>
                </div>
                <div class="col-12 lg:col-6 px-3">
                    <RouterLink to="/culture/1">
                        <div class="shadow-3 px-3 py-3 card-culture border-round-md grid">
                            <div class="sm:col-5 col-12">
                                <div>
                                    <img src="https://awsimages.detik.net.id/community/media/visual/2022/09/20/tradisi-lompat-batu_169.jpeg?w=1200"
                                        class="w-full border-round-md" alt="hero image" />
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="font-semibold text-lg  mb-3">Lompat Batu Nias</div>
                                <div class="font-medium flex gap-2">
                                    <i class="bi bi-geo-alt"></i>
                                    <div>Sumatera Barat</div>
                                </div>
                                <div class="flex gap-2 mt-2">
                                    <i class="bi bi-pencil"></i>
                                    <div class="font-medium">Fachri Bahri</div>
                                </div>
                                <div class="flex gap-2 mt-2">
                                    <i class="bi bi-newspaper"></i>
                                    <div class="max-line-2 mt-1">
                                        Sebuah tradisi yang hanya dilakukan oleh laki-laki suku Nias. Tradisi Lompat
                                        Batu biasanya dilakukan para pemuda dengan cara melompati tumpukan batu setinggi
                                        2 meter untuk menunjukkan bahwa mereka sudah pantas untuk dianggap dewasa secara
                                        fisik.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </RouterLink>
                </div>
                <div class="col-12 lg:col-6 px-3">
                    <RouterLink to="/culture/1">
                        <div class="shadow-3 px-3 py-3 card-culture border-round-md grid">
                            <div class="sm:col-5 col-12">
                                <div>
                                    <img src="https://plazarenon.com/lumonata-plugins/additional/background/mageret-pandan-1562125653.jpeg"
                                        class="w-full border-round-md" alt="hero image" />
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="font-semibold text-lg  mb-3">Mageret Pandan</div>
                                <div class="font-medium flex gap-2">
                                    <i class="bi bi-geo-alt"></i>
                                    <div>Bali</div>
                                </div>
                                <div class="flex gap-2 mt-2">
                                    <i class="bi bi-pencil"></i>
                                    <div class="font-medium">Putu Juniawan</div>
                                </div>
                                <div class="flex gap-2 mt-2">
                                    <i class="bi bi-newspaper"></i>
                                    <div class="max-line-2 mt-1">
                                        Perang pandan adalah salah satu tradisi yang ada di Desa Tenganan, Kecamatan
                                        Karangasem, Bali. Perang pandan juga disebut dengan istilah makere-kere. Upacara
                                        perang pandan menjadi daya tarik bagi wisatawan, baik wisatawan dalam negeri
                                        maupun wisatawan asing.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </RouterLink>
                </div>
                <div class="col-12 lg:col-6 px-3">
                    <RouterLink to="/culture/1">
                        <div class="shadow-3 px-3 py-3 card-culture border-round-md grid">
                            <div class="sm:col-5 col-12">
                                <div>
                                    <img src="https://www.blibli.com/friends-backend/wp-content/uploads/2022/07/60dacbf4238f5.jpg" class="w-full border-round-md"
                                        alt="hero image" />
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="font-semibold text-lg  mb-3">Tari Saman</div>
                                <div class="font-medium flex gap-2">
                                    <i class="bi bi-geo-alt"></i>
                                    <div>Aceh</div>
                                </div>
                                <div class="flex gap-2 mt-2">
                                    <i class="bi bi-pencil"></i>
                                    <div class="font-medium">Ahmad Doni</div>
                                </div>
                                <div class="flex gap-2 mt-2">
                                    <i class="bi bi-newspaper"></i>
                                    <div class="max-line-2 mt-1">
                                        Tari Saman merupakan salah satu kesenian berasal dari kabupaten Gayo, Aceh yang memperkuat budaya Indonesia sehingga berada di pangkuan dunia. Sejarah mengenai Tari Saman belum ada pendapat secara pasti awal terciptanya nama tari yang berasal dari Gayo ini.
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
.card-culture {}

.card-culture:hover {
    background-color: rgba(251, 251, 251, 0.925);
}
</style>