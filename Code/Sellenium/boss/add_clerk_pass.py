import unittest
from selenium import webdriver
from test_utility import static_data, fields


class AddClerk(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()
        self.driver.get(static_data.base_url + "login")
        fields.get_components_by_name(self.driver, ["username=Radni", "password=testtest",
                                                    "submit"])[2].click()
        self.driver.get(static_data.base_url + "profile/clerks-table")
        self.driver.find_element_by_id("addShow").click()

    def test_add_clerk_pass_mismatch(self):
        a = len(self.driver.find_elements_by_tag_name('tr'))
        fields.get_components_by_name(self.driver, ["name=smjfas", "family=feyzabadisani", "email=smjfas@gmail.com",
                                                    "person_id=1234565987", "username=smjfas", "password=hello123",
                                                    "repass=hello12321212", "cellphone=09398604014", "income=100",
                                                    "address=21st number baker st.", "captcha=1234", "add"])[11].click()
        b = len(self.driver.find_elements_by_tag_name('tr'))
        assert a - b is 0

    def tearDown(self):
        self.driver.close()


if __name__ == "__main__":
    unittest.main()
