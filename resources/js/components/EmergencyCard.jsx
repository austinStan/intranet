import React from "react";

const EmergencyCard = ({ contact }) => {
    return (
        <div className="col-sm-12 col-md-6 mt-5  emergency">
            <img
                className=" emergency-icons"
                src="/assets/images/icons/phone.svg"
                alt="Emergency Icon"
            />

            <div>
                <h4 className="text-center text-danger mt-3">
                    {contact.name ? contact.name : ""}
                </h4>

                <h4 className="text-center" style={{ color: "#2a9df4" }}>
                    {contact.phonenumber ? contact.phonenumber : ""}
                </h4>

                <h4 className="text-center" style={{ color: "#2a9df4" }}>
                    {contact.email ? contact.email : ""}
                </h4>
            </div>
        </div>
    );
};

export default EmergencyCard;
