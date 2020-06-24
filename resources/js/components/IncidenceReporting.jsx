import React, { useState } from "react";
import axios from "axios";

export default function IncidenceReporting({ staff_id }) {
    const [title, setTitle] = useState("");
    const [description, setDescription] = useState("");
    const [successMessage,setSuccessMessage]=useState(false);
    const [errorMessage,setErrorMessage]=useState(false);

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

    const reportIncident = async event => {
        event.preventDefault();

        if (title.trim().length < 1) {
            document.getElementById("title-error-message").innerHTML =
                "Enter Title/Name of Incident";
            return;
        }

        if (description.trim().length < 1) {
            document.getElementById("description-error-message").innerHTML =
                "Enter a description of the Incident";
            return;
        }

    //     try {
    //         const response = await axios.post("/incidentreporting", {
    //             title,
    //             description,
    //             staff_id
    //         });

    //         setTitle("");
    //         setDescription("");
    //         // console.log(response);

    //         // return alert("Incident Reported Successfully");
    //         return Swal.fire({
    //             position: "top-end",
    //             icon: "success",
    //             title: "Incidence Reported Successfully",
    //             showConfirmButton: false,
    //             timer: 1500
    //         });
    //     } catch (error) {
    //         // console.log(error);

    //         Swal.fire({
    //             icon: "error",
    //             title: "Oops...",
    //             text: "Something went wrong!"
    //             // footer: '<a href>Why do I have this issue?</a>'
    //         });
    //     }
    // };

        axios.post('/incidentreporting', {
            title,
            description,
            staff_id
          })
          .then(function (response) {
            setTitle("");
            setDescription("");
            console.log(response.data);
            setSuccessMessage(true);
          }).catch(function (error) {
            console.log(error);
            setErrorMessage(true);
          });
        }
    return (
        <div>
            <h4 className="section-headings">Incidence Reporting</h4>

            <div>
                <form onSubmit={reportIncident}>
                { successMessage && <div className="alert alert-success" role="alert">
                        Incident Mail message sent successfully !!
                        </div>
                   }
                { errorMessage && <div className="alert alert-danger" role="alert">
                        Error in Sending incident mail...Please Try Again.!!
                        </div>
                   }
                    <div className="form-group">
                        <label htmlFor="title">Incident Title/Name</label>

                        <input
                            className="form-control"
                            type="text"
                            name="title"
                            value={title}
                            onChange={onTitleInputChange}
                            id=""
                            placeholder="Title"
                            required
                        />

                        <p
                            className="text-danger font-weight-bold"
                            id="title-error-message"
                        ></p>
                    </div>

                    <div className="form-group">
                        <label htmlFor="description">
                            Incident Description
                        </label>
              
                        <textarea
                            className="form-control"
                            name="description"
                            value={description}
                            onChange={onDescriptionInputChange}
                            cols="30"
                            rows="10"
                            placeholder="Message"
                            required
                            style={{ resize: "none" }}
                        ></textarea>

                        <p
                            className="text-danger font-weight-bold"
                            id="description-error-message"
                        ></p>
                    </div>

                    <button className="btn btn-danger">Report Incident</button>
                </form>
            </div>
        </div>
    );
}
