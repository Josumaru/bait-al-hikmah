const pinjamBuku = (idBuku, idMember) => {
    window.location.href = `/?act=pinjam?idBuku=${idBuku}&idMember=${idMember}`
}