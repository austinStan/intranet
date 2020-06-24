import React, { useState, useEffect } from "react";
import Layout from "../Layouts/Layout";
import Banner from "../../components/Banner";
import Sidebar from "../../components/Navigation/Sidebar";

import axios from "axios";

import nProgress from "nprogress";
import "nprogress/nprogress.css";

import Swal from "sweetalert2";

export default function ComputerAssistance({ departments, staff_id }) {
    nProgress.start();
    // useEffect(() => {

    //     return () => {
    //         nnprogress.remove();
    //     };
    // }, []);

    const [title, setTitle] = useState("");
    const [description, setDescription] = useState("");
    const [department_id, setDepartmentId] = useState("0");
    // const [successMessage,setSuccessMessage]=useState(false);
    // const [errorMessage,setErrorMessage]=useState(false);

    const onTitleInputChange = event => {
        event.preventDefault();
        setSuccessMessage(false);
        setErrorMessage(false);
        document.getElementById("title-error-message").innerHTML = "";
        setTitle(event.target.value);
    };

    const onDescriptionInputChange = event => {
        event.preventDefault();
        setSuccessMessage(false);
        setErrorMessage(false);
        document.getElementById("description-error-message").innerHTML = "";
        setDescription(event.target.value);
    };

    const onDepartmentInputChange = event => {
        event.preventDefault();
        setSuccessMessage(false);
        setErrorMessage(false);
        document.getElementById("department-error-message").innerHTML = "";
        setDepartmentId(event.target.value);
    };

    const requestComputerAssistance = async event => {
        event.preventDefault();

        // try {
        //     console.log(`
        //     `);

            if (title.trim().length < 1) {
                document.getElementById("title-error-message").innerHTML =
                    "Title is required";
                return;
            }

            if (department_id === "0") {
                document.getElementById("department-error-message").innerHTML =
                    "Select a department";
                return;
            }

            if (description.trim().length < 1) {
                document.getElementById("description-error-message").innerHTML =
                    "Description is required";
                return;
            }

            try {
                const response = await axios.post("/computerassistance", {
                    title,
                    description,
                    department_id,
                    staff_id
                });

                // console.log(title.trim().length);
                // console.log(description.trim().length);
                // console.log(department_id);
                setTitle("");
                setDescription("");
                setDepartmentId("0");

                // return alert("Assistance Request Made Successfully");
                // console.log(response.data);
                return Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Computer Assistance Request Sent Successfully",
                    showConfirmButton: false,
                    timer: 1500
                });
            } catch (error) {
                Swal.fire({
                    icon: "error",
                    title: "An Error Occurred",
                    text: "Failed To Request For Computer Assistance!"
                    // footer: '<a href>Why do I have this issue?</a>'
                });
            }
    //         const response = await axios.post("/computerassistance", {
    //             title,
    //             description,
    //             department_id, 
    //         });
    //       //  console.log(response.data);
    //         // console.log(title.trim().length);
    //         // console.log(description.trim().length);
    //         // console.log(department_id);
    //         setTitle("");
    //         setDescription("");
    //         setDepartmentId("0");

    //         setSuccessMessage(true);
            
           
    //     } catch (error) {
    //         console.log(`An error occurred: ${error}`);
    //         setErrorMessage(true);
    //     }
    // };

   // console.log(user_id);
  //  console.log(departments);
    
    return (
        <section>
            <div>
                <Banner title="Computer Assistance" />

                <div className="">
                    <nav aria-label="breadcrumb " style={{ paddingTop: "0px" }}>
                        <ol className="breadcrumb">
                            <li className="breadcrumb-item">
                                <a href="/">Home</a>
                            </li>

                            <li className="breadcrumb-item active">
                                <a
                                    href="/computerassistance"
                                    aria-current="page"
                                >
                                    Computer Assistance
                                </a>
                            </li>
                        </ol>
                    </nav>
                </div>

                <div className="container">
                    <div className="row">
                        <div className="col-sm-12 col-lg-3">
                            <Sidebar />
                        </div>

                        <div className="col-sm-12 col-lg-9">
                            <form onSubmit={requestComputerAssistance}>
                                    {/* { successMessage && <div className="alert alert-success" role="alert">
                                    Request For Computer Assistance Mail successfully sent!
                                    </div>
                                    }
                                    { errorMessage && <div className="alert alert-danger" role="alert">
                                    error in sending request For Computer Assistance mail
                                    </div>
                                    } */}
                                <div className="form-group">
                                    <label htmlFor="title">Title</label>
                                    <input
                                        className="form-control"
                                        type="text"
                                        name="title"
                                        id=""
                                        placeholder="Title"
                                        value={title}
                                        onChange={onTitleInputChange}
                                        required
                                    />

                                    <p
                                        className="text-danger font-weight-bold"
                                        id="title-error-message"
                                    ></p>
                                </div>

                                <div className="form-group">
                                    <label htmlFor="departments">
                                        Select a department to request help from
                                    </label>

                                    <select
                                        className="form-control"
                                        name="departments"
                                        value={department_id}
                                        onChange={onDepartmentInputChange}
                                    >
                                        {departments &&
                                        departments.length >= 1 ? (
                                            <>
                                                <option value="0">
                                                    Choose a department
                                                </option>

                                                {departments.map(department => (
                                                    <option
                                                        value={
                                                            department.id
                                                                ? department.id
                                                                : ""
                                                        }
                                                    >
                                                        {department.name
                                                            ? department.name
                                                            : ""}
                                                    </option>
                                                ))}
                                            </>
                                        ) : (
                                            <option></option>
                                        )}
                                        {/* <option value="volvo">Volvo</option>
                                        <option value="saab">Saab</option>
                                        <option value="fiat">Fiat</option>
                                        <option value="audi">Audi</option> */}
                                    </select>
                                    <p
                                        className="text-danger font-weight-bold"
                                        id="department-error-message"
                                    ></p>
                                </div>

                                <div className="form-group">
                                    <label htmlFor="description">
                                        Description
                                    </label>
                                    <textarea
                                        className="form-control"
                                        name="description"
                                        id=""
                                        cols="30"
                                        rows="15"
                                        placeholder="Description"
                                        style={{ resize: "none" }}
                                        value={description}
                                        onChange={onDescriptionInputChange}
                                        required
                                    ></textarea>
                                    <p
                                        className="text-danger font-weight-bold"
                                        id="description-error-message"
                                    ></p>
                                </div>

                                <button
                                    type="submit"
                                    className="btn btn-primary"
                                >
                                    Request Computer Assistance
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    );
}

ComputerAssistance.layout = page => (
    <Layout children={page} title="Computer Assistance | Kampala Hospital" />
);
}