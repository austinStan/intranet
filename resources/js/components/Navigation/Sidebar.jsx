import React, { useEffect, useState } from "react";

const Sidebar = () => {
    const [systems, setSystems] = useState([]);

    useEffect(() => {
        const abortController = new AbortController();

        fetch("api/v1/externalsystems")
            .then(response => response.json())
            .then(systems => setSystems(systems.external_systems))
            .catch(error => console.log(error));

        return () => {
            abortController.abort();
        };
    }, []);

    console.log(systems);

    return (
        // <div className="sidebar">
        //     <ul>
        //         <li>
        //             <a href="/announcements">Announcements</a>
        //         </li>

        //         <li>
        //             <a href="/documents">Documents</a>
        //         </li>

        //         <li>
        //             <a href="/events">Events</a>
        //         </li>

        //         <li>
        //             <a href="/emergency">Emergency Contacts</a>
        //         </li>

        //         <li>
        //             <a href="/computerassistance">Computer Service Request</a>
        //         </li>

        //         <div className="dropdown-me" style={{ marginLeft: "15px" }}>
        //             <span className="">External Links</span>
        //             <div className="dropdown-me-content">
        //                 {systems && systems.length > 0 ? (
        //                     <>
        //                         {systems.map(s => (
        //                             <li>
        //                                 <a
        //                                     key={s.id}
        //                                     href={s.link ? s.link : ""}
        //                                 >
        //                                     {s.name ? s.name : ""}
        //                                 </a>
        //                             </li>
        //                         ))}
        //                     </>
        //                 ) : (
        //                     <div style={{ padding: "10px" }}>
        //                         <h6 style={{ color: "#2a9df4" }}>
        //                             No External Systems Added
        //                         </h6>
        //                     </div>
        //                 )}
        //             </div>
        //         </div>
        //     </ul>
        // </div>

        <nav className="">
            <h2 className="navbar-brand">Quick Links</h2>

            <div className="mt-2">
                <a className="btn btn-block sid-bar-link" href="/announcements">
                    Announcements
                    <span className="sr-only">(current)</span>
                </a>
            </div>

            <div>
                <a className="btn btn-block sid-bar-link" href="/documents">
                    Documents
                </a>
            </div>

            <div>
                <a className="btn btn-block sid-bar-link" href="/events">
                    Events
                </a>
            </div>

            <div>
                <a className="btn btn-block sid-bar-link" href="/emergency">
                    Emergency Contacts
                </a>
            </div>

            <div className=" dropdown">
                <a
                    className="btn btn-block sid-bar-link dropdown-toggle"
                    href="#"
                    id="navbarDropdownMenuLink"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                >
                    External System Links
                </a>
                <div
                    className="dropdown-menu"
                    aria-labelledby="navbarDropdownMenuLink"
                >
                    {systems && systems.length > 0 ? (
                        <>
                            {systems.map(s => (
                                <li className="nav-item">
                                    <a
                                        className="dropdown-item"
                                        key={s.id}
                                        href={s.link ? s.link : ""}
                                    >
                                        {s.name ? s.name : ""}
                                    </a>
                                </li>
                            ))}
                        </>
                    ) : (
                        <div style={{ padding: "10px" }}>
                            <h6 style={{ color: "#2a9df4" }}>
                                No External Systems Added
                            </h6>
                        </div>
                    )}
                </div>
            </div>
        </nav>
    );
};

export default Sidebar;
