const API_URL = "../backend/index.php";

// State to hold data for lookups
let movies = [];
let rooms = [];

document.addEventListener("DOMContentLoaded", async () => {
  await Promise.all([loadMovies(), loadRooms()]);
  loadScreenings();

  // Event Listeners for Forms
  document
    .getElementById("addMovieForm")
    .addEventListener("submit", handleAddMovie);
  document
    .getElementById("addRoomForm")
    .addEventListener("submit", handleAddRoom);
  document
    .getElementById("addScreeningForm")
    .addEventListener("submit", handleAddScreening);
});

/* ========== MOVIES ========== */

async function loadMovies() {
  try {
    const response = await fetch(`${API_URL}?action=list_movies`);
    movies = await response.json();
    renderMovies(movies);
    updateMovieOptions(); // Update dropdowns
  } catch (error) {
    console.error("Error loading movies:", error);
  }
}

function renderMovies(moviesList) {
  const tbody = document.getElementById("moviesList");
  tbody.innerHTML = "";
  moviesList.forEach((movie) => {
    const tr = document.createElement("tr");
    tr.innerHTML = `
            <td>${movie.title}</td>
            <td>${movie.duration} min</td>
            <td>${movie.genre}</td>
            <td>
                <button class="btn btn-sm btn-danger" onclick="deleteMovie(${movie.id})"><i class="bi bi-trash"></i></button>
            </td>
        `;
    tbody.appendChild(tr);
  });
}

async function handleAddMovie(e) {
  e.preventDefault();
  const formData = new FormData(e.target);

  try {
    const response = await fetch(`${API_URL}?action=add_movie`, {
      method: "POST",
      body: formData,
    });
    const result = await response.json();
    if (result.success) {
      e.target.reset();
      loadMovies();
      // Switch to list view or show success? For now just reload list
    } else {
      alert("Error adding movie");
    }
  } catch (error) {
    console.error("Error adding movie:", error);
  }
}

async function deleteMovie(id) {
  if (!confirm("Are you sure you want to delete this movie?")) return;

  const formData = new FormData();
  formData.append("id", id);

  try {
    await fetch(`${API_URL}?action=delete_movie`, {
      method: "POST",
      body: formData,
    });
    loadMovies();
  } catch (error) {
    console.error("Error deleting movie:", error);
  }
}

/* ========== ROOMS ========== */

async function loadRooms() {
  try {
    const response = await fetch(`${API_URL}?action=list_rooms`);
    rooms = await response.json();
    renderRooms(rooms);
    updateRoomOptions(); // Update dropdowns
  } catch (error) {
    console.error("Error loading rooms:", error);
  }
}

function renderRooms(roomsList) {
  const tbody = document.getElementById("roomsList");
  tbody.innerHTML = "";
  roomsList.forEach((room) => {
    const tr = document.createElement("tr");
    tr.innerHTML = `
            <td>${room.name}</td>
            <td>${room.capacity}</td>
            <td>
                <button class="btn btn-sm btn-danger" onclick="deleteRoom(${room.id})"><i class="bi bi-trash"></i></button>
            </td>
        `;
    tbody.appendChild(tr);
  });
}

async function handleAddRoom(e) {
  e.preventDefault();
  const formData = new FormData(e.target);

  try {
    const response = await fetch(`${API_URL}?action=add_room`, {
      method: "POST",
      body: formData,
    });
    const result = await response.json();
    if (result.success) {
      e.target.reset();
      loadRooms();
    } else {
      alert("Error adding room");
    }
  } catch (error) {
    console.error("Error adding room:", error);
  }
}

async function deleteRoom(id) {
  if (!confirm("Are you sure?")) return;
  const formData = new FormData();
  formData.append("id", id);
  try {
    await fetch(`${API_URL}?action=delete_room`, {
      method: "POST",
      body: formData,
    });
    loadRooms();
  } catch (error) {
    console.error("Error deleting room:", error);
  }
}

/* ========== SCREENINGS ========== */

async function loadScreenings() {
  try {
    const response = await fetch(`${API_URL}?action=list_screenings`);
    const screenings = await response.json();
    renderScreenings(screenings);
  } catch (error) {
    console.error("Error loading screenings:", error);
  }
}

function renderScreenings(screeningsList) {
  const tbody = document.getElementById("screeningsList");
  tbody.innerHTML = "";
  screeningsList.forEach((screening) => {
    // Find movie and room names
    const movie = movies.find((m) => m.id == screening.movie_id) || {
      title: "Unknown Movie",
    };
    const room = rooms.find((r) => r.id == screening.room_id) || {
      name: "Unknown Room",
    };

    const tr = document.createElement("tr");
    tr.innerHTML = `
            <td>${movie.title}</td>
            <td>${room.name}</td>
            <td>${new Date(screening.start_time).toLocaleString()}</td>
            <td>
                <button class="btn btn-sm btn-danger" onclick="deleteScreening(${screening.id})"><i class="bi bi-trash"></i></button>
            </td>
        `;
    tbody.appendChild(tr);
  });
}

async function handleAddScreening(e) {
  e.preventDefault();
  const formData = new FormData(e.target);

  try {
    const response = await fetch(`${API_URL}?action=add_screening`, {
      method: "POST",
      body: formData,
    });
    const result = await response.json();
    if (result.success) {
      e.target.reset();
      loadScreenings();
    } else {
      alert("Error adding screening");
    }
  } catch (error) {
    console.error("Error adding screening:", error);
  }
}

async function deleteScreening(id) {
  if (!confirm("Are you sure?")) return;
  const formData = new FormData();
  formData.append("id", id);
  try {
    await fetch(`${API_URL}?action=delete_screening`, {
      method: "POST",
      body: formData,
    });
    loadScreenings();
  } catch (error) {
    console.error("Error deleting screening:", error);
  }
}

/* ========== HELPERS ========== */

function updateMovieOptions() {
  const select = document.getElementById("screeningMovie");
  // Save current selection if any
  const currentVal = select.value;

  select.innerHTML =
    '<option value="" selected disabled>Choisir un film...</option>';
  movies.forEach((movie) => {
    const option = document.createElement("option");
    option.value = movie.id;
    option.textContent = movie.title;
    select.appendChild(option);
  });

  if (currentVal) select.value = currentVal;
}

function updateRoomOptions() {
  const select = document.getElementById("screeningRoom");
  const currentVal = select.value;

  select.innerHTML =
    '<option value="" selected disabled>Choisir une salle...</option>';
  rooms.forEach((room) => {
    const option = document.createElement("option");
    option.value = room.id;
    option.textContent = room.name;
    select.appendChild(option);
  });

  if (currentVal) select.value = currentVal;
}
