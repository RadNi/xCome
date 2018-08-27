import unittest
from selenium import webdriver
from test_utility import static_data, fields


class AddClerk(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()
        self.driver.get(static_data.base_url + "login")
        fields.get_components_by_name(self.driver, ["username=boss", "password=bossboss",
                                                    "submit"])[2].click()
        self.driver.get(static_data.base_url + "profile/clerks-table")
        self.driver.find_element_by_id("addShow").click()

    def test_add_clerk_email(self):
        fields.get_components_by_name(self.driver, ["name=clerk", "family=feyzabadisani", "email=smjfaail.com",
                                                    "person_id=1234565987", "username=smjfas", "password=hello123",
                                                    "repass=hello123", "cellphone=09398604014", "income=100",
                                                    "address=21st number baker st.", "submit"])[10].click()
        # todo assertion

    def tearDown(self):
        self.driver.close()


if __name__ == "__main__":
    unittest.main()
