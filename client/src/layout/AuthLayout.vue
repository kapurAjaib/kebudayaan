<template>
    <div class="flex relative">
        <div
            class="side-content top-0 left-0 sticky lg:h-screen overflow-hidden flex-shrink-1 flex-grow-0 lg:flex hidden">

            <div>
                <div>
                    <div class="text-3xl font-medium font-italic text-gray">Welcome To</div>
                    <div class=" font-medium side-content-brand-name">EXPLORE BUDAYA</div>
                </div>
                <div class="mt-3">
                    <div>Jelajahi Ragam Budaya Dari Indonesia</div>
                </div>
            </div>
        </div>
        <div class="flex-grow-1 md:flex-shrink-0 flex  flex-column align-items-center md:px-5 lg:px-8 px-4">
            <slot></slot>
        </div>
    </div>
</template>
<style scoped>
.text-gray {
    color: #b4b4bb;
}

.side-content {
    padding: 120px 50px;
    display: flex;
    align-items: end;
    justify-content: center;
    color: rgb(255, 252, 252);
    max-width: 900px;
    width: 100%;
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('@/assets/image/register.png');
    background-position: 0%;
    background-size: cover;
}

.side-content>div {
    width: 100%;
    max-width: 600px;
    align-items: end;
}

.side-content-brand-name {
    font-size: clamp(2.5rem, 1rem + 2vw, 3rem);
}
</style>