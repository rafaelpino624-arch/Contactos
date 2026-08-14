import { useState, useEffect } from "react";

function App() {

  const [nombre, setNombre] = useState("");
  const [email, setEmail] = useState("");
  const [telefono, setTelefono] = useState("");
  const [contactos, setContactos] = useState([]);
  const [contactoEditando, setContactoEditando] = useState(null);

  const cargarContactos = async () => {
  const respuesta = await fetch(
    "http://localhost:8000/api/contactos.php"
  );

  const datos = await respuesta.json();

  setContactos(datos);
};
useEffect(() => {
  cargarContactos();
}, []);

const eliminarContacto = async (id) => {
  const respuesta = await fetch(
    `http://localhost:8000/api/contactos.php?id=${id}`,
    {
      method: "DELETE",
    }
  );

  const datos = await respuesta.json();

  console.log(datos);

  cargarContactos();
};

const editarContacto = (contacto) => {
  setContactoEditando(contacto);

  setNombre(contacto.nombre);
  setEmail(contacto.email);
  setTelefono(contacto.telefono);
};


const actualizarContacto = async () => {
  const respuesta = await fetch(
    `http://localhost:8000/api/contactos.php?id=${contactoEditando.id}`,
    {
      method: "PUT",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        nombre: nombre,
        email: email,
        telefono: telefono,
      }),
    }
  );

  const datos = await respuesta.json();

  console.log(datos);

  setContactoEditando(null);

  setNombre("");
  setEmail("");
  setTelefono("");

  cargarContactos();
};



  const agregarContacto = async (e) => {
  e.preventDefault();

  const respuesta = await fetch(
    "http://localhost:8000/api/contactos.php",
    {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        nombre: nombre,
        email: email,
        telefono: telefono,
      }),
    }
  );

  const datos = await respuesta.json();

  console.log(datos);
};
  return (
    <div>
      <h1>Gestión de Contactos</h1>

      <form onSubmit={agregarContacto}>
        <input
          type="text"
          placeholder="Nombre"
          value={nombre}
          onChange={(e) => setNombre(e.target.value)}
        />

        <input
          type="email"
          placeholder="Email"
          value={email}
          onChange={(e) => setEmail(e.target.value)}
        />

        <input
          type="text"
          placeholder="Teléfono"
          value={telefono}
          onChange={(e) => setTelefono(e.target.value)}
        />
        <button type="button" onClick={ contactoEditando ? actualizarContacto : agregarContacto } > {contactoEditando ? "Actualizar contacto" : "Agregar contacto"}
       </button>
      </form>

      <h2>Contactos</h2>

      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Acciones</th>
          </tr>
        </thead>

        <tbody>
         {contactos.map((contacto) => (
    <tr key={contacto.id}>
      <td>{contacto.id}</td>
      <td>{contacto.nombre}</td>
      <td>{contacto.email}</td>
      <td>{contacto.telefono}</td>
      <td>
        <button onClick={() => editarContacto(contacto)}>
  Editar
</button>
       <button onClick={() => eliminarContacto(contacto.id)}>
  Eliminar
</button>
      </td>
    </tr>
  ))}
        </tbody>
      </table>
    </div>
  );


}

export default App;